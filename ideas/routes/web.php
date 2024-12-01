<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;

Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('idea', [IdeaController::class, 'store'])->name('idea.store');

Route::get('terms', function() {
    return view('terms');
});
