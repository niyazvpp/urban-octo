<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedJobsController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $savedJobs = $user->savedJobs()
            // ->wherePivot('status', 'applied')
            ->get();
        return response()->json($savedJobs);
    }
}
