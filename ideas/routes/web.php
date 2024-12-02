<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;

Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::get('ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('ideas/edit/{idea}', [IdeaController::class, 'edit'])->name('ideas.edit');
Route::put('ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
Route::delete('ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::get('terms', function() {
    return view('terms');
});
