<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('login',  [AdminController::class, 'login'])->name('login');

    Route::get('dashboard',  [AdminController::class, 'dashboard'])->name('dashboard');

    Route::post('authenticate', [AdminController::class, 'authenticate'])->name('authenticate');
});


// Users Routes
Route::prefix('users')->group(function(){
    Route::get('/register', [UserController::class, 'register'])->name('register');

    Route::post('/register', [UserController::class, 'registerAuthenticate'])->name('register.authenticate');

    Route::get('/login', [UserController::class, 'login'])->name('users.login');

    Route::post('/authenticate', [UserController::class, 'loginAuthenticate'])->name('login.authenticate');
});
