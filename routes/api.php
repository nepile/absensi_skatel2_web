<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Core\PresensiController;
use App\Http\Controllers\Core\UpdatePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'handleLoginOnMobile']);
Route::middleware(['jwt.auth', 'jwt.verify'])->group(function () {
    Route::post('/change-password', [UpdatePasswordController::class, 'changePassword']);
    Route::post('/presensi', [PresensiController::class, 'presensi']);
    Route::prefix('/rekap-presensi')->group(function () {
        Route::get('/harian', [PresensiController::class, 'rekapPresensiHarian']);
        Route::get('/bulanan', [PresensiController::class, 'rekapPresensiBulanan']);
    });
});
