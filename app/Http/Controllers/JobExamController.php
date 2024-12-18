<?php

namespace App\Http\Controllers;

use App\Models\JobExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\CheckTrait;
use App\Models\InterestArea;

class JobExamController extends Controller
{
    // use CheckTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $interestAreas = $user->interestAreas()->select('interest_areas.id', 'name')->get();
        $interestAreasNotOwnedByUser = InterestArea::whereNotIn('id', $user->interestAreas()->pluck('interest_areas.id'))->get();

        // This will return all the interest areas that the user doesn't have.


        $qualifications = $user->specialQualifications()->select('special_qualifications.id', 'name')->get();
        return view('ihya.job_filter', compact('interestAreas', 'qualifications', 'interestAreasNotOwnedByUser'));
    }

    public function allJobs()
    {
        $jobs = JobExam::get();
        return response()->json($jobs);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create() {}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the current authenticated user
        $user = Auth::user();
        $user_age = \Carbon\Carbon::parse($user->dob)->age;
        $user_gender = $user->gender; // Assuming gender is stored in the user table
        $userQualifications = $user->specialQualifications()->pluck('special_qualifications.id')->toArray();

        // Initialize the query with the relationships
        $jobsQuery = JobExam::query()->with(['interestArea', 'jobQualifications']);

        // Apply the age and gender filter
        $jobsQuery->where(function ($query) use ($user_age, $user_gender) {
            $query->where(function ($q) use ($user_age) {
                $q->where('min_age', '<=', $user_age)->where('max_age', '>=', $user_age);
            })
                ->where(function ($q) use ($user_gender) {
                    $q->where('gender', '=', $user_gender)->orWhere('gender', '=', 'all');
                });
        });

        // Apply other filters like government type, interest areas, qualifications
        if ($request->filled('gov_type')) {
            $jobsQuery->where('gov', $request->gov_type);
        }

        if ($request->filled('interest_areas')) {
            $jobsQuery->whereHas('interestArea', function ($q) use ($request) {
                $q->whereIn('interest_areas.id', $request->interest_areas);
            });
        }
        if ($request->filled('type')) {
            $jobsQuery->where('type', $request->type);
        }

        // Get the all jobs count for removed jobs due to age and gender
        $allJobs = $jobsQuery->get(); // This fetches all jobs without pagination
        $removedJobsCountAgeAndGender = $allJobs->filter(function ($job) use ($user_age, $user_gender) {
            return ($job->min_age > $user_age || $job->max_age < $user_age) || ($job->gender !== $user_gender && $job->gender !== "all");
        })->count();
        if ($allJobs->count() === $removedJobsCountAgeAndGender) {
            return response()->json([
                'error' => "No jobs are available for your age {$user_age} or gender {$user_gender} on basis of this filter."
            ]);
        }

        // Now apply pagination
        // $perPage = 5; // Number of jobs per page
        // $page = $request->input('page', 1); // Current page, default to 1
        // $filteredJobs = $jobsQuery->paginate($perPage, ['*'], 'page', $page);

        // Apply the is_qualified filter
        if ($request->filled('is_qualified')) {
            if ($request->is_qualified == 'qualified') {
                // Only return jobs where the user has all qualifications
                $filteredJobs = $allJobs->filter(function ($job) use ($userQualifications) {
                    $qualificationCheck = $this->checkQualifications($userQualifications, $job->jobQualifications->pluck('id')->toArray());
                    return $qualificationCheck['qualified']; // Keep jobs where user is qualified
                });
            }

            if ($request->is_qualified == 'not_qualified') {
                $notQualifiedJobs = [];

                // Go through each job to find missing and having qualifications
                foreach ($allJobs as $job) {
                    $qualificationCheck = $this->checkQualifications(
                        $userQualifications,
                        $job->jobQualifications->pluck('id')->toArray()
                    );

                    if (!$qualificationCheck['qualified']) {
                        // If not qualified, add job details along with qualification information
                        $notQualifiedJobs[] = [
                            'job' => $job,
                            'missing_qualifications' => $qualificationCheck['missing'],
                            'having_qualifications' => $qualificationCheck['having'],
                            'is_qualified' => $qualificationCheck['qualified'],
                        ];
                    }
                }

                // Return the not-qualified jobs with details
                return response()->json([
                    'removed_jobs_count' => $removedJobsCountAgeAndGender,
                    'not_qualified_jobs' => $notQualifiedJobs,
                    'is_qualified' => false
                ]);
            }
        }

        // Return the filtered jobs along with the count of removed jobs due to age and gender
        return response()->json([
            'removed_jobs_count' => $removedJobsCountAgeAndGender,
            'is_qualified' => true,
            'jobs' => $filteredJobs
        ]);
    }




    /**
     * Check qualifications for a job.
     */
    private function checkQualifications($userQualifications, $jobQualifications)
    {
        // If no qualifications are required for the job, the user is automatically qualified
        if (empty($jobQualifications)) {
            return [
                'qualified' => true,
                'having' => [], // No specific qualifications needed
                'missing' => [], // No missing qualifications
            ];
        }

        // Calculate missing qualifications: required by the job but not owned by the user
        $missingQualifications = array_diff($jobQualifications, $userQualifications);

        // Calculate having qualifications: required by the job and owned by the user
        $havingQualifications = array_intersect($jobQualifications, $userQualifications);

        // Fetch the names of missing qualifications
        $missingQualificationsNames = \App\Models\SpecialQualification::whereIn('id', $missingQualifications)
            ->pluck('name')
            ->toArray();

        // Fetch the names of having qualifications
        $havingQualificationsNames = \App\Models\SpecialQualification::whereIn('id', $havingQualifications)
            ->pluck('name')
            ->toArray();

        // Check if there are any missing qualifications
        if (count($missingQualifications) > 0) {
            return [
                'qualified' => false,
                'having' => $havingQualificationsNames, // Qualifications the user has
                'missing' => $missingQualificationsNames, // Names of qualifications the user lacks
            ];
        }

        // If no qualifications are missing, the user is fully qualified
        return [
            'qualified' => true,
            'having' => $havingQualificationsNames, // User has all required qualifications
            'missing' => [], // No missing qualifications
        ];
    }









    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user_age = \Carbon\Carbon::parse($user->dob)->age;
        $user_gender = $user->gender; // Assuming gender is stored in the user table
        $userQualifications = $user->specialQualifications()->pluck('special_qualifications.id')->toArray();
        // Initialize the query with the relationships
        $job = JobExam::with(['interestArea', 'jobQualifications'])->find($id);
        $jobQualifications = $job->jobQualifications->pluck('id')->toArray();
        $result = $this->checkQualifications($userQualifications, $jobQualifications);

        $data = [];
        if ($result['qualified']) {
            $data[] = [
                'job' =>  $job,
                'qualified' => $result['qualified'],
            ];
        } else {
            $data[] = [
                'job' => $job,
                'qualified' => $result['qualified'],
                'having' => $result['having'],
                'missing' => $result['missing'],
            ];
        }
        return view('ihya.job_show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = Auth::user();
        // $user_gender = $user->gender;
        // $area = $user->interestAreas()->pluck('interest_areas.id')->toArray();  // Convert to array

        // $user_age = \Carbon\Carbon::parse($user->dob)->age;
        // $userQualifications = $user->specialQualifications()->pluck('special_qualifications.id')->toArray();

        // $jobs = JobExam::with(['interestArea', 'jobQualifications'])->get();
        // $jobQualNames = $jobs->flatMap(function ($job) {
        //     return $job->jobQualifications->pluck('name');
        // })->toArray();
        // // Removed jobs on basis of age
        // $removedJobsCountAge = $jobs->filter(function ($job) use ($user_age) {
        //     return $job->min_age > $user_age || $job->max_age < $user_age;  // Correct filter closure
        // })->count();
        // // Removed jobs on basis of gender
        // $removedJobsCountGender = $jobs->filter(function ($job) use ($user_gender) {
        //     return $job->gender !== $user_gender && $job->gender !== "all";  // Correct filter closure
        // })->count();


        // //filtered jobs on basis of age and gender
        // $filteredJobs = $jobs->filter(function ($job) use ($user_age, $user_gender) {
        //     return $job->min_age <= $user_age &&
        //         $job->max_age >= $user_age &&
        //         ($job->gender === $user_gender || $job->gender === 'all');
        // });
        // // filtered jobs on basis of age, gender and interested area
        // $interested_filteredJobs = $filteredJobs->filter(function ($job) use ($area) {
        //     // Use Laravel's `intersect` method to find overlaps
        //     return collect($job->interestArea->pluck('id'))->intersect($area)->isNotEmpty();
        // });


        // // filtered jobs on basis of age, gender and Not-interested area
        // $notInterested_filteredJobs = $filteredJobs->reject(function ($job) use ($area) {
        //     return collect($job->interestArea->pluck('id'))->intersect($area)->isNotEmpty();
        // });






        // // Filter qualified and not qualified jobs from filtered interested areas
        // $interestedFilteredQualified = [];
        // $interestedFilteredNotQualified = [];
        // foreach ($interested_filteredJobs as $job) {
        //     $jobQualifications = $job->jobQualifications->pluck('id')->filter()->toArray();
        //     // dd($jobQualifications);
        //     $result = $this->checkQualifications($userQualifications, $jobQualifications);

        //     if ($result['qualified']) {
        //         $interestedFilteredQualified[] = $job;
        //     } else {
        //         $interestedFilteredNotQualified[] = [
        //             'job' => $job,
        //             'missing' => $result['missing'],
        //         ];
        //     }
        // }



        // // Filter qualified and not qualified jobs from filtered not-interested areas
        // $notInterestedFilteredQualified = [];
        // $notInterestedFilteredNotQualified = [];
        // foreach ($notInterested_filteredJobs as $job) {
        //     $jobQualifications = $job->jobQualifications->pluck('id')->filter()->toArray();
        //     $result = $this->checkQualifications($userQualifications, $jobQualifications);

        //     if ($result['qualified']) {
        //         $notInterestedFilteredQualified[] = $job;
        //     } else {
        //         $NotInterestedFilteredNotQualified[] = [
        //             'job' => $job,
        //             'missing' => $result['missing'],
        //         ];
        //     }
        // }
        // // dd($interestedFilteredNotQualified);


        // return response()->json([
        //     'interested_filtered_qualified' => $interestedFilteredQualified,
        //     'interested_filtered_not_qualified' => $interestedFilteredNotQualified,
        //     'not_interested_filtered_qualified' => $notInterestedFilteredQualified,
        //     'not_interested_filtered_not_qualified' => $notInterestedFilteredNotQualified,
        //     'removed_age' => $removedJobsCountAge,
        //     'removed_gender' => $removedJobsCountGender,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
