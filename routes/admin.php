<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AdminOrderController;

// Route Login Admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Dashboard (hanya bisa diakses setelah login)
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD Game / Layanan Joki
    Route::resource('games', GameController::class, ['as' => 'admin']);

    // CRUD Galeri
    Route::resource('galleries', GalleryController::class, ['as' => 'admin']);

    // Order management for admin
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
});


