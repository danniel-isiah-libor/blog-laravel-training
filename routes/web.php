<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/posts')->name('posts.')->group(function () {
    Route::get('/create', [PostController::class, 'create'])
        ->name('create');

    Route::post('/store', [PostController::class, 'store'])
        ->name('store');

    Route::get('/{post}', [PostController::class, 'show'])
        ->name('show');

    Route::get('/{post}/edit', [PostController::class, 'edit'])
        ->name('edit');

    Route::put('/{post}/update', [PostController::class, 'update'])
        ->name('update');
});

require __DIR__ . '/auth.php';
