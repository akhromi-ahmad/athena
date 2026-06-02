<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

//index page
Route::get('/', function () {
    return view('public.login');
});

//login page
Route::get('/login', function () {
    return view('public.login');
});


//signup page
Route::get('/signup', function () {
    return view('public.signup');
});

//signup process
Route::post('/signup', function () {
    $credentials = request()->validate([
        'username' => 'required|string|unique:users,username',
        'password' => 'required|string|min:8',
    ]);

    try {
        $user = \App\Models\User::create([
            'username' => $credentials['username'],
            'password' => Crypt::encryptString($credentials['password']),
        ]);

        Auth::login($user);
        request()->session()->regenerate();

        return redirect('/products');
    } catch (\Exception $e) {
        Log::error('Signup failed: ' . $e->getMessage());
        return back()->withInput()->withErrors(['general' => 'Signup failed, please try again.']);
    }
});

//login process
//encrypt password using standard hashing for enterprise scale applications
Route::post('/login', function () {
    $credentials = request()->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = \App\Models\User::where('username', $credentials['username'])->first();

    if (!$user || Crypt::decryptString($user->password) !== $credentials['password']) {
        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    Auth::login($user);
    request()->session()->regenerate();

    return redirect('/products');
});

//products page
Route::get('/products', function () {
    return view('product.products');
});
