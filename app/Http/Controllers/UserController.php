<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;       // untuk login and logout function
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(AuthRequest $request)
    {
        $validated = $request->validated();                     // Input validation
        $user = User::create([                             // Save new user to database
            'username' => $validated['username'],               // store username
            'password' => $validated['password'],               // store password (hashed automaticly)
        ]);

        return redirect()->route('login')->with('success', 'Signup successfully'); // show notif that signpup successfully and redirect to login page
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();               // Input validation

        if (Auth::attempt($credentials)) {                  // verify and stored login session automatically
            $request->session()->regenerate();              // regenerate session id to prevent session fixation attack

            return redirect()->route('products')->with('success', 'Login successfully'); // show notif that login successfully and redirect to products page
        }

        return redirect()->back()->with('error', 'invalid credentials'); // show notif that invalid credentials and redirect to back login page
    }

    public function logout(Request $request)
    {
        Auth::logout();                                  // the function of this line is terminate the login session
        $request->session()->invalidate();               // the function of this line is delete the session that already used
        $request->session()->regenerateToken();          // the function of this line is regenerate the session token

        return redirect()->route('login')->with('success', 'Logout successfully'); // show notif that logout successfully and redirect to login page
    }
}
