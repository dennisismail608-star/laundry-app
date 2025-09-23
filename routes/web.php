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
use App\Http\Controllers\ReportController;
use Illuminate\Auth\Events\Logout;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

Route::get('content/dashboard', [HomeController::class, 'index'])->name('content.dashboard');
route::middleware(['auth', 'checkLevel:2,1'])->group(function () {
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    route::resource('users', UserController::class);
    route::resource('level', LevelController::class);
    route::resource('customer', CustomerController::class);
    Route::resource('service', ServiceController::class);
});

Route::middleware(['auth', 'checkLevel:3,1'])->group(function () {
    Route::resource('order', OrderController::class);
    Route::patch('/order/{id}/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    // Route::get('order/{order}/pickup', [PickupController::class, 'create'])->name('pickup.create');
    // Route::post('order/{order}/pickup', [PickupController::class, 'store'])->name('pickup.store');
    Route::post('/order/{id}/complete', [OrderController::class, 'complete'])->name('order.complete');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/{id}/detail', [ReportController::class, 'details'])->name('report.detail');
    Route::get('/report/{id}/pdf', [ReportController::class, 'exportPDF'])->name('report.pdf');
    Route::get('/report/pdf-all', [ReportController::class, 'exportAllPDF'])->name('report.pdf.all');
});
