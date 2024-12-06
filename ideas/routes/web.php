<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::get('ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('ideas/edit/{idea}', [IdeaController::class, 'edit'])->name('ideas.edit')->middleware(['auth']);
Route::put('ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update')->middleware(['auth']);
Route::delete('ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware(['auth']);

Route::post('ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware(['auth']);

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('register');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('terms', function() {
    return view('terms');
});
