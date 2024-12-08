<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {

    Route::get('register', 'register')->name('register');
    Route::post('register', 'store')->name('register');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authenticate');
    Route::post('logout', 'logout')->name('logout');
});
