<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('content/dashboard', [HomeController::class, 'index'])->name('content.dashboard');
route::resource('user', UserController::class);
