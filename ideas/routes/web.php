<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'ideas',
    'as' => 'ideas.'
], function() {
    
    Route::get('{idea}', [IdeaController::class, 'show'])->name('show'); // ->withoutMiddleware(['auth']);
    
    Route::group(['middleware' => ['auth']], function() {
        // Route::post('', [IdeaController::class, 'store'])->name('store'); // ->withoutMiddleware(['auth']);
        // Route::get('edit/{idea}', [IdeaController::class, 'edit'])->name('edit');
        // Route::put('{idea}', [IdeaController::class, 'update'])->name('update');
        // Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::post('{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});
*/

Route::get('', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::resource('ideas', IdeaController::class)
    ->except(['index', 'create', 'show'])
    ->middleware(['auth']);

Route::resource('ideas', IdeaController::class)
    ->only(['show']);

Route::resource('ideas.comments', CommentController::class)
    ->only(['store'])
    ->middleware('auth');

Route::resource('users', UserController::class)
    ->only('show', 'edit', 'update')
    ->middleware('auth');

Route::get('terms', function() {
    return view('terms');
});
