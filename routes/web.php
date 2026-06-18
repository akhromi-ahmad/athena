<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// index page
Route::get('/', function () {
    return view('public.login');
})->name('index');

// signup page
Route::get('/signup', function () {
    return view('public.signup');
})->name('signup');

// logout process
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// user can access login page if not authenticated
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('public.login');
    })->name('login');

    // login proccess
    Route::post('/login', [UserController::class, 'login'])->name('user.login');

    // signup process
    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');

});

// products page
Route::get('/products', function () {
    return view('product.products');
})->middleware('auth')->name('products');

// will be add a guest route if user authenticated but accessing login page or signup page, it will be redirect to products page
