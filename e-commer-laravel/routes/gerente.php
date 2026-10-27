<?php

use App\Http\Controllers\Gerente\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas de gestión para Productos y Categorías (Asignadas al Compañero 1)
Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);