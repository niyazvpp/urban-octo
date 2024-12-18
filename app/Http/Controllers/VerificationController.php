<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function verifyIndex()
    {
        $user = Auth::user();
        if ($user->email_verified_at) {
            return redirect()->route('home');
        }
        return view('verify');
    }

    public function sendOtp(Request $request)
    {
        $user = Auth::user();
        if ($user->email_verified_at) {
            return response()->json(['message' => 'User is already verified.'], 400);
        }
        if ($user->otp_sent_at && $user->otp_sent_at->diffInSeconds(Carbon::now()) < 120) {
            $remainingTime = 120 - $user->otp_sent_at->diffInSeconds(Carbon::now());
            return response()->json([
                'message' => 'Please wait before resending the OTP.',
                'remaining' => $remainingTime
            ], 429);
        }

        // Generate a new OTP
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_sent_at = Carbon::now();
        $user->save();
        try {
            Mail::to($user->email)->send(new OtpMail($otp));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP. Please try again later.'], 500);
        }

        return response()->json(['message' => 'OTP sent successfully.']);
    }
    public function verifyOtp(Request $request)
    {
        $user = Auth::user();
        if (!$user->otp_sent_at || $user->otp_sent_at->diffInMinutes(Carbon::now()) > 10) {
            return response()->json(['message' => 'Invalid OTP or OTP expired.'], 400);
        }
        if ($request->otp == $user->otp) {
            $user->email_verified_at = Carbon::now();
            $user->otp = null;
            $user->otp_sent_at = null;
            $user->save();
            return response()->json(['message' => 'Email verified successfully.']);
        }
        return response()->json(['message' => 'Invalid OTP.'], 400);
    }
}
