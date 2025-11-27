<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\UserAuthController;

Route::middleware('check.not.admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/games/{game}', [UserController::class, 'gameDetail'])->name('user.game.detail');
});

// User Auth Routes
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.store');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.store');

// User Logout (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
    
    // Order Routes (Protected - require auth)
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin.php';
});
