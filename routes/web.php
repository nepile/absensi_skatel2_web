<?php

use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Core\OverviewController as Overview;
use Illuminate\Support\Facades\Route;

Route::get('/', [Login::class, 'showLogin'])->name('login');
Route::post('/handleLogin', [Login::class, 'handleLogin'])->name('handleLogin');

Route::middleware('auth')->group(function () {
    Route::get('/overview', [Overview::class, 'showOverview'])->name('overview');
});
