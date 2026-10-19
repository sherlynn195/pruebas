
<?php

use App\Http\Controllers\Cliente\DashboardController;
use App\Http\Controllers\Cliente\CatalogoController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/catalogo', [CatalogoController::class, 'index'])
    ->name('catalogo');
