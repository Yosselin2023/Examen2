<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentoController; 
use App\Http\Controllers\ProveedorController; 
use App\Http\Controllers\EmpleadoController;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('medicamentos', MedicamentoController::class)->except(['show']);
    Route::resource('proveedores', ProveedorController::class)->except(['show']);
    Route::resource('empleados', EmpleadoController::class)->except(['show']);
});