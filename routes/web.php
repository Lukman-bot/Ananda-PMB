<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

// Route For Login
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
// End Route For Login

// Routes yang memerlukan autentikasi
Route::middleware(SessionAuth::class)->group(function () {
    // Route For Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // End Route For Dashboard

    // Route For Data Pengguna
    Route::group(['prefix' => 'pengguna'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('pengguna.index');
        Route::post('/listData', [UsersController::class, 'listData'])->name('pengguna.listData');
    });
    // End Route For Data Pengguna

    // Route For Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    // End Route For Logout
});
