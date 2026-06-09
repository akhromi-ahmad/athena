<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

//index page
Route::get('/', function () {
    return view('public.login');
});

Route::get('/signup', function () {
    return view('public.signup');
});