<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Ruta para mostrar el formulario de creación del CV
Route::get('/cv/create', [CVController::class, 'create'])
    ->middleware(['auth'])
    ->name('cv.create');
    Route::get('/cv', [CVController::class, 'index'])->middleware(['auth'])->name('cv.index');
Route::get('/cv/{id}', [CVController::class, 'show'])->name('cv.show');

require __DIR__.'/auth.php';