<?php

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginUserController::class, 'login'])->name('login');
Route::post('/', [LoginUserController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group( function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/users', UserController::class);

    Route::resource('/equipments', EquipmentController::class);

    Route::resource('/allocations', AllocationController::class);
});
