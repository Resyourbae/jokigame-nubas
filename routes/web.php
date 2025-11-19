<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::middleware('check.not.admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');

    // Order routes for users
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});
