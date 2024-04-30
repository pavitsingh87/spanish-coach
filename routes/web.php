<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PvMappingController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::get('/pv-mappings', [PvMappingController::class, 'index'])->name('pv-mappings.index');
    Route::get('/pv-mappings/create', [PvMappingController::class, 'create'])->name('pv-mappings.create');
    Route::post('/pv-mappings', [PvMappingController::class, 'store'])->name('pv-mappings.store');
    Route::get('/pv-mappings/{id}/edit', [PvMappingController::class, 'edit'])->name('pv-mappings.edit');
    Route::put('/pv-mappings/{id}', [PvMappingController::class, 'update'])->name('pv-mappings.update');
    Route::delete('/pv-mappings/{id}', [PvMappingController::class, 'destroy'])->name('pv-mappings.destroy');
});

require __DIR__.'/auth.php';
