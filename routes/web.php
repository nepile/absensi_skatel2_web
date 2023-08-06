<?php

use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Core\ClassController as ClassManage;
use App\Http\Controllers\Core\LogActivityController as LogActivity;
use App\Http\Controllers\Core\OverviewController as Overview;
use App\Http\Controllers\Core\PresensiController as Presensi;
use App\Http\Controllers\Core\UsersController as User;
use Illuminate\Support\Facades\Route;

Route::get('/', [Login::class, 'showLogin'])->name('login');
Route::post('/handleLogin', [Login::class, 'handleLoginOnWeb'])->name('handleLogin');
Route::post('/handleLogout', [Login::class, 'handleLogout'])->name('handleLogout');

Route::middleware('auth')->group(function () {
    Route::get('/overview', [Overview::class, 'showOverview'])->name('overview');
    Route::prefix('/data')->group(function () {
        Route::get('/presensi', [Presensi::class, 'showPresensi'])->name('presensi');
        Route::get('/guru', [User::class, 'showGuru'])->name('guru');
        Route::get('/siswa', [User::class, 'showSiswa'])->name('siswa');
        Route::get('/kelas', [ClassManage::class, 'showClass'])->name('classManage');
    });
    Route::prefix('/create')->group(function () {
        Route::post('/user', [User::class, 'createUser'])->name('createUser');
        Route::post('/class', [ClassManage::class, 'createClass'])->name('createClass');
    });
    Route::prefix('/update')->group(function () {
        Route::post('/user/{user_id}', [User::class, 'updateUser'])->name('updateUser');
        Route::post('/class/{class_id}', [ClassManage::class, 'updateClass'])->name('updateClass');
    });
    Route::prefix('/delete')->group(function () {
        Route::post('/user/{user_id}', [User::class, 'deleteUser'])->name('deleteUser');
        Route::post('/class/{class_id}', [ClassManage::class, 'deleteClass'])->name('deleteClass');
    });
    Route::get('/user_activity', [LogActivity::class, 'showLogActivity'])->name('user_activity');
});
