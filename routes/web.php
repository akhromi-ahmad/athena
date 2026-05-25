<?php

use Illuminate\Support\Facades\Route;

//first page
Route::get('/', function () {
    return view('login');
});

//login validation and redirect to dashboard
Route::get('/login', function () {
    return view('login');
});
