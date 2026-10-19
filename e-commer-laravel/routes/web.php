<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'publico.inicio')->name('inicio');
Route::view('/quienes-somos', 'publico.quienes-somos')->name('quienes-somos');
Route::view('/mision-vision', 'publico.mision-vision')->name('mision-vision');
Route::view('/ubicacion', 'publico.ubicacion')->name('ubicacion');
Route::view('/contactanos', 'publico.contactanos')->name('contactanos');

// Después de iniciar sesión, cada usuario va a su dashboard según su rol
Route::get('/dashboard', function () {
    return match (auth()->user()->rol) {
        'gerente'  => redirect()->route('gerente.dashboard'),
        'empleado' => redirect()->route('empleado.dashboard'),
        default    => redirect()->route('cliente.dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:cliente'])->prefix('cliente')->name('cliente.')
    ->group(base_path('routes/cliente.php'));

Route::middleware(['auth', 'role:empleado'])->prefix('empleado')->name('empleado.')
    ->group(base_path('routes/empleado.php'));

Route::middleware(['auth', 'role:gerente'])->prefix('gerente')->name('gerente.')
    ->group(base_path('routes/gerente.php'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';