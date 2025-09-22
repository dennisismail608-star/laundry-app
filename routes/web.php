<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PickupController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

Route::get('content/dashboard', [HomeController::class, 'index'])->name('content.dashboard');
route::middleware(['auth', 'checkLevel:2,1'])->group(function () {
    route::resource('users', UserController::class);
    route::resource('level', LevelController::class);
    route::resource('customer', CustomerController::class);
    Route::resource('service', ServiceController::class);
});

Route::middleware(['auth', 'checkLevel:3,1'])->group(function () {
    Route::resource('order', OrderController::class);
    Route::patch('/order/{id}/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('order/{order}/pickup', [PickupController::class, 'create'])->name('pickup.create');
    Route::post('order/{order}/pickup', [PickupController::class, 'store'])->name('pickup.store');
});
