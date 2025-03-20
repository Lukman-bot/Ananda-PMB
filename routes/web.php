<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;

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
        Route::post('/', [UsersController::class, 'save']);
        Route::get('/reqdata/{id}', [UsersController::class, 'reqData']);
        Route::post('/delete', [UsersController::class, 'delete']);
    });
    // End Route For Data Pengguna

    // Route For Program Studi
    Route::group(['prefix' => 'prodi'], function() {
        Route::get('/', [ProgramStudiController::class, 'index']);
        Route::post('/listData', [ProgramStudiController::class, 'listData'])->name('prodi.listData');
        Route::post('/', [ProgramStudiController::class, 'save']);
        Route::get('/reqdata/{id}', [ProgramStudiController::class, 'reqData']);
        Route::post('/delete', [ProgramStudiController::class, 'delete']);
    });
    // End Route For Program Studi

    // Route For Fakultas
    Route::group(['prefix' => 'fakultas'], function() {
        Route::post('/listData', [FakultasController::class, 'listData'])->name('fakultas.listData');
        Route::post('/', [FakultasController::class, 'save']);
        Route::get('/reqdata/{id}', [FakultasController::class, 'reqData']);
        Route::post('/delete', [FakultasController::class, 'delete']);
    });
    // End Route For Fakultas

    // Route For Agama
    Route::group(['prefix' => 'agama'], function() {
        Route::get('/', [AgamaController::class, 'index'])->name('agama.index');
        Route::post('/listData', [AgamaController::class, 'listData'])->name('agama.listData');
        Route::post('/', [AgamaController::class, 'save'])->name('agama.save');
        Route::get('/reqdata/{id}', [AgamaController::class, 'reqData'])->name('agama.req-data');
        Route::post('/delete', [AgamaController::class, 'delete'])->name('agama.delete');
    });
    // End Route For Agama

    // Route For Agama
    Route::group(['prefix' => 'alamat'], function() {
        Route::get('/', [AlamatController::class, 'index']);
        Route::get('/kecamatan/{id}', [AlamatController::class, 'kecamatan']);

        // Route For Provinsi
        Route::group(['prefix' => 'provinsi'], function() {
            Route::post('/listData', [ProvinsiController::class, 'listData'])->name('provinsi.listData');
            Route::post('/', [ProvinsiController::class, 'save']);
            Route::get('/reqdata/{id}', [ProvinsiController::class, 'reqData']);
            Route::post('/delete', [ProvinsiController::class, 'delete']);
        });
        // End Route For Provinsi

        // Route For Kota
        Route::group(['prefix' => 'kota'], function() {
            Route::post('/listData', [KotaController::class, 'listData'])->name('kota.listData');
            Route::post('/', [KotaController::class, 'save']);
            Route::get('/reqdata/{id}', [KotaController::class, 'reqData']);
            Route::post('/delete', [KotaController::class, 'delete']);
        });
        // End Route For Kota

        // Route For Kecamatan
        Route::group(['prefix' => 'kecamatan'], function() {
            Route::post('/listData', [KecamatanController::class, 'listData'])->name('kecamatan.listData');
            Route::post('/', [KecamatanController::class, 'save']);
            Route::get('/reqdata/{id}', [KecamatanController::class, 'reqData']);
            Route::post('/delete', [KecamatanController::class, 'delete']);
        });
        // End Route For Kecamatan
    });
    // End Route For Agama

    // Route For Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    // End Route For Logout
});
