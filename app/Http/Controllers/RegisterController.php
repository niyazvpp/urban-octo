<?php

namespace App\Http\Controllers;

use App\Jobs\NewUserEvent;
use App\Mail\OtpMail;
use App\Models\Admin;
use App\Models\Qualification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahalls = Admin::where('role', 'admin')->pluck('name', 'id')->toArray();
        $qualifications = Qualification::with('specialQualifications')->get();
        return view('ihya.register.index', compact('mahalls', 'qualifications'));
    }

    public function login()
    {
        return view('ihya.login');
    }
    public function loginAuthenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $credentials = ['email' => $request->email, 'password' => $request->password];
        $checked = $request->has('remember') && $request->remember == true ? true : false;
        if (Auth::attempt($credentials, $checked)) {
            return response()->json('success', 200);
        } else {
            return response()->json('failed', 401);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mahall' => ['required', 'integer', 'exists:admins,id'],
            'dob' => ['required', 'date', 'before:today'],
            'phone_number' => ['nullable', 'integer', 'unique:users'],
            'gender' => ['required', 'in:male,female'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mahall' => $request->mahall,
            'dob' => $request->dob,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        NewUserEvent::dispatch($request->name, $request->mahall);

        Auth::login($user);

        return response()->json('success');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
