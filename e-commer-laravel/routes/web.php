<?php

use Illuminate\Support\Facades\Route;

// Páginas públicas
Route::view('/', 'publico.inicio')->name('inicio');
Route::view('/quienes-somos', 'publico.quienes-somos')->name('quienes-somos');
Route::view('/mision-vision', 'publico.mision-vision')->name('mision-vision');
Route::view('/ubicacion', 'publico.ubicacion')->name('ubicacion');
Route::view('/contactanos', 'publico.contactanos')->name('contactanos');

// Después de iniciar sesión, cada usuario va a su dashboard según su rol
Route::get('/dashboard', function () {
    return match (auth()->user()->rol) {
        'administrador' => redirect()->route('administrador.dashboard'),
        'gerente' => redirect()->route('gerente.dashboard'),
        default => redirect()->route('cliente.dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:administrador'])->prefix('administrador')->name('administrador.')
    ->group(base_path('routes/administrador.php'));

Route::middleware(['auth', 'role:gerente'])->prefix('gerente')->name('gerente.')
    ->group(base_path('routes/gerente.php'));

Route::middleware(['auth', 'role:cliente'])->prefix('cliente')->name('cliente.')
    ->group(base_path('routes/cliente.php'));

// Login, registro y logout (manuales)
require __DIR__.'/auth.php';
