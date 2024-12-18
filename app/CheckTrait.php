<?php

namespace App;

use Illuminate\Support\Str;

trait CheckTrait
{
    public function checkQualifications($userQualifications, $jobQualifications)
    {
        $havingQualifications = [];
        $missingQualifications = [];
        $qualified = false;
        $matched = [];

        // Ensure jobQualifications is not null or empty
        if (empty($jobQualifications)) {
            return [
                'qualified' => false,
                'having' => [],
                'missing' => [],
            ];
        }

        // Loop through each qualification in job's qualifications (which is an array of IDs)
        foreach ($jobQualifications as $qualificationId) {
            // Check if the user's qualifications match the job qualification ID
            if (in_array($qualificationId, $userQualifications)) {
                $matched[] = $qualificationId;  // If matched, add to the "matched" list
            } else {
                $missing[] = $qualificationId;  // If not matched, add to the "missing" list
            }
        }

        // If all qualifications are matched, set as qualified
        if (count($matched) == count($jobQualifications)) {
            $havingQualifications[] = $matched;
            $qualified = true;  // User qualifies if they meet all job qualifications
        } else {
            $missingQualifications[] = $missing;
        }

        return [
            'qualified' => $qualified,                 // Boolean flag for qualification
            'having' => $havingQualifications,          // Qualifications user has
            'missing' => $missingQualifications,        // Qualifications user is missing
        ];
    }



    public function createSlug($title, $model)
    {
        // Convert title to slug
        $slug = Str::slug($title);

        // Check if slug is unique
        $existingSlug = $model::where('slug', $slug)->first();

        // If slug is not unique, make it unique by appending a number
        $counter = 1;
        while ($existingSlug) {
            $slug = Str::slug($title) . '-' . $counter;
            $existingSlug = $model::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
