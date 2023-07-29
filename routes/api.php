<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Core\UpdatePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'handleLoginOnMobile']);
Route::middleware(['jwt.auth', 'jwt.verify'])->group(function () {
    Route::post('/change-password', [UpdatePasswordController::class, 'changePassword']);
});
