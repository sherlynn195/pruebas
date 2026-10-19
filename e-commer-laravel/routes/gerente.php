<?php

use App\Http\Controllers\Gerente\DashboardController;
use Illuminate\Support\Facades\Route;

// Ruta principal del Dashboard (con o sin parámetros para la gestión de usuarios)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Acciones del CRUD procesadas en el mismo Dashboard
Route::post('/users', [DashboardController::class, 'storeUser'])->name('users.store');
Route::put('/users/{user}', [DashboardController::class, 'updateUser'])->name('users.update');
Route::delete('/users/{user}', [DashboardController::class, 'destroyUser'])->name('users.destroy');