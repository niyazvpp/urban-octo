<?php

namespace App\Http\Controllers;

use App\Models\InterestArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestAreaController extends Controller
{
    public function index()
    {

        return view('register_2.interest_area');
    }
    public function create()
    {
        $user = Auth::user();
        $interests = InterestArea::all();
        $interestedAreas = $user->interestAreas()->pluck('interest_areas.id');
        return response()->json(['interests' => $interests, 'interested' => $interestedAreas]);
    }
    public function store(Request $request)
    {

        $user = Auth::user();
        $areas = $request->interested_areas;
        $syncable = [];

        // Prepare the pivot data with timestamps
        foreach ($areas as $area) {
            $syncable[$area] = [
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $user->interestAreas()->sync($syncable);
        return response()->json(['message' => 'Interest areas updated successfully.']);
    }
}
