<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route For Login
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
// End Route For Login
