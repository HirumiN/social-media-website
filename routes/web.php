<?php

use App\Http\Controllers\HomeCOntroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeCOntroller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/u/{user:username}', [ProfileController::class, 'index'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::post('/u/{user}/update-cover', [ProfileController::class, 'updateCover'])
    ->name('profile.updateCover');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/storage/{path}', function ($path) {
    return response()->file(storage_path("app/public/{$path}"));
})->where('path', '.*')->name('storage');


require __DIR__ . '/auth.php';
