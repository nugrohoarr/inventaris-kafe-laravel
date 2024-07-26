<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('forgotPassword');

// Route::get('/', function () {
//     return view('login');
// });
