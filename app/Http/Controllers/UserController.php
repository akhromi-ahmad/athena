<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(AuthRequest $request)
    {
        $validated = $request->validated();                     // Validasi input (menggunakan class AuthRequest)
        $user = UserModel::create([                             // Simpan user baru ke database
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Signup successfully'); // show notif that signpup successfully and redirect to login page
    }

    public function login(AuthRequest $request)
    {
        $validated = $request->validated();

        $user = UserModel::where('username', $validated['username'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        return redirect()->route('products')->with('success', 'Login successfully');
    }
}
