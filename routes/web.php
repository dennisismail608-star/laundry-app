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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('content/dashboard', [HomeController::class, 'index'])->name('content.dashboard');
route::resource('user', UserController::class);
route::resource('level', LevelController::class);
route::resource('customer', CustomerController::class);
Route::resource('service', ServiceController::class);
Route::resource('order', OrderController::class);
