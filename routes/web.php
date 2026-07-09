<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// logout process
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');

// user can access login page if not authenticated
Route::middleware('guest')->group(function () {
    // index page
    Route::get('/', function () {
        return view('public.login');
    })->name('index');

    Route::get('/login', function () {
        return view('public.login');
    })->name('login');

    // login proccess
    Route::post('/login', [UserController::class, 'login'])
        ->middleware('throttle:login')
        ->name('user.login');

    // signup page
    Route::get('/signup', function () {
        return view('public.signup');
    })->name('signup');

    // signup process
    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');
});

// products page
Route::get('/products', function () {
    return view('product.products');
})->middleware('auth')->name('products');
