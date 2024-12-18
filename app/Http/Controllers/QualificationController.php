<?php

namespace App\Http\Controllers;

use App\Models\InterestArea;
use App\Models\Qualification;
use App\Models\SpecialQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QualificationController extends Controller
{
    public function index()
    {
        $interestAreas = InterestArea::select('id', 'name')->get();
        $qualifications = Qualification::select('id', 'name')->with('specialQualifications')->get();
        // // return response()->json($qualifications);
        return view('ihya.register_2.qualification', compact('qualifications', 'interestAreas'));
    }

    public function cutti()
    {
        $qualifications = Qualification::select('id', 'name')->with('specialQualifications')->get();
        // // return response()->json($qualifications);
        // return view('qualification', compact('qualifications'));
        return response()->json($qualifications);
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        // Get the qualifications from the request (encrypted IDs)
        $ids = $request->qualifications;

        // Decrypt each ID and store them in a new array
        $filteredIds = array_filter($ids, function ($id) {
            return !empty($id); // Removes blank IDs (empty strings, null, etc.)
        });

        // Decrypt each valid ID
        $decryptedIds = array_map(function ($id) {
            return decrypt($id); // Decrypt each valid ID
        }, $filteredIds);

        // Manually validate the decrypted IDs (using the decrypted array)
        Validator::make(['qualifications' => $decryptedIds], [
            'qualifications' => 'required|array',
            'qualifications.*' => 'integer|exists:special_qualifications,id', // Validate decrypted IDs
        ])->validate();

        // Prepare the data array for sync (using decrypted IDs)
        $data = [];
        foreach ($decryptedIds as $id) {
            $data[$id] = ['created_at' => now(), 'updated_at' => now()];
        }

        // Sync the qualifications to the user
        $user->specialQualifications()->sync($data);

        // Return the response with the synced data
        return response()->json($data);
    }
}
