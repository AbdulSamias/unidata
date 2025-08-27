<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showSignupForm()
    {
        return view('auth.register');
    }
    function signup(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'mobile' => ['required', 'string', 'regex:/^\+?\d{10,15}$/', 'unique:users,mobile'],
                'gender' => 'required|in:male,female,other',
                'dob' => 'required|date|before:today',
                'age' => ['required', 'integer', 'gt:0'],
                'password' => 'required|string|min:4|confirmed',
                'role' => 'required',
            ],
            [
                'dob.before' => 'Date of birth must be before today.',
                'gender.in' => 'Gender must be either "male" or "female".',
                'mobile.regex' => 'Mobile number must be 10 to 15 digits and may start with +.',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'role' => $request['role']
        ]);
        Auth::login($user);
        return redirect()->route('all.university.names')->with('success', 'student Register Successfully');

    }
    function showloginform()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('all.university.names');
        }

        return back()->withErrors([
            'email' => 'Email or Password is incorrect',
        ])->onlyInput('email');
    }


    function logout(Request $request)
    {
        Auth::logout();  // User ko logout kar do
        $request->session()->invalidate();  // Session invalidate karo
        $request->session()->regenerateToken();  // CSRF token regenerate karo
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }

    function change_password_form()
    {
        return view('auth.changepassword');
    }
    function change_password(Request $request)
    {
        $request->validate([
            'currentpassword' => ['required', 'current_password'],
            'newpassword' => 'required|string|min:4|confirmed'
        ]);
        if (!Hash::check($request->currentpassword, Auth::user()->password)) {
            return back()->withErrors(['currentpassword' => 'Incorrect current password']);
        }
        $user = Auth::user();
        $user->password = Hash::make($request->newpassword);

        $user->save();
        logger('Password updated successfully');
        return redirect()->route('all.university.names')->with('success', 'Password changed successfully!');


    }

    function home()
    {
        return view('mail.send-email');
    }

}
