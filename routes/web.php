<?php

use App\helpers\ArrayHelpers;
use App\Http\Controllers\forum\ForumCategoryController;
use App\Http\Controllers\forum\ForumCommentController;
use App\Http\Controllers\forum\ForumPostController;
use App\Http\Controllers\InterestAreaController;
use App\Http\Controllers\JobExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SavedJobsController;
use App\Http\Controllers\VerificationController;
use App\Models\interest_job;
use App\Models\InterestArea;
use App\Models\JobExam;
use App\Models\SpecialQualification;
use App\Models\spQualJob;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('ihya.first');
});



Route::get('/import', function () {
    $smallPath = storage_path('app\public\qualIntUpload1.csv');

    $generateRow = function ($row) {
        return [
            'sp_id' => $row[0],
            'job_id' => $row[1],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    };

    foreach (ArrayHelpers::chunkFile($smallPath, $generateRow, 228) as $chunk) {
        spQualJob::insert($chunk);
    }
    return 'Interest Area data has been successfully inserted.';
});
Route::middleware('guest')->group(function () {
    Route::resource('register', RegisterController::class);
    Route::get('/login', [RegisterController::class, 'login'])->name('login');
    Route::post('/login/authenticate', [RegisterController::class, 'loginAuthenticate'])->name('login.authenticate');
    Route::get('/cutti', [QualificationController::class, 'cutti'])->name('cutti');
    Route::get('/homee', function () {
        return view('ihya.index');
    })->name('homee');
});


Route::middleware(['auth', 'verification'])->group(function () {
    // Home page
    // Route::get('/dashboard', function () {
    //     return view('welcome');
    // })->name('home');
    // Interest Area pages
    Route::resource('interest', InterestAreaController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('qualification', QualificationController::class);
    Route::resource('jobs', JobExamController::class);
    Route::resource('savedjobs', SavedJobsController::class);

    Route::resource('forum_post', ForumPostController::class);
    Route::post('/forum_like', [ForumPostController::class, 'forum_like'])->name('forum_like');
    Route::resource('forum_category', ForumCategoryController::class);
    Route::resource('forum_comment', ForumCommentController::class);

    Route::get('/alljobs', [JobExamController::class, 'allJobs'])->name('allJobs');
    Route::get('/career', function () {
        return view('ihya.career_path.index');
    })->name('career');
    Route::get('/dashboard', function () {
        return view('ihya.logged_home');
    })->name('home');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
    Route::get('/verify_email', [VerificationController::class, 'verifyIndex'])->name('verify_email');
    Route::post('/send_otp', [VerificationController::class, 'sendOtp'])->name('send_otp');
    Route::post('/verify_otp', [VerificationController::class, 'verifyOtp'])->name('verify_otp');
});

// Route::get('/api/state', [userController::class], '')
