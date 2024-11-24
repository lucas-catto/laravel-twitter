<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('feed', function () {
    return view('feed');
});
