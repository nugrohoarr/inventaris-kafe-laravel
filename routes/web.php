<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    // User routes
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Barang routes using resource controller
    Route::resource('barang', BarangController::class);
    // Barang Masuk routes
    Route::resource('barang-masuk', BarangMasukController::class);
    // Barang Keluar routes
    Route::resource('barang-keluar', BarangKeluarController::class);

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('password.request');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/', function () {
//     return view('login');
// });
