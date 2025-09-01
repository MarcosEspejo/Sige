<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\JefeEgresadoController;

// Página principal pública
Route::get('/', function () {
    return view('principal');
})->name('principal');

// Rutas de login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');

// Rutas protegidas (solo si está autenticado)
Route::middleware('auth')->group(function () {

    // -------------------------
    // Egresados
    // -------------------------
    Route::prefix('egresados')->name('egresados.')->group(function () {
        Route::get('/', [EgresadoController::class, 'index'])->name('index');

        Route::middleware('role:egresado')->group(function () {
            Route::get('/{id}', [EgresadoController::class, 'show'])->name('show');
            Route::get('/notifications', [EgresadoController::class, 'notifications'])->name('notifications.index');
        });

        // Extra (si realmente necesitas esta duplicada)
        Route::get('/show', [EgresadoController::class, 'show'])->name('show.alt');
    });

    // -------------------------
    // Jefe de Egresados
    // -------------------------
    Route::prefix('jefe-egresados')->name('jefeEgresados.')->group(function () {
        Route::get('/', [JefeEgresadoController::class, 'index'])->name('index');
    });

    // -------------------------
    // Utilidades
    // -------------------------
    Route::get('/proximamente', function () {
        return view('proximamente'); // temporal
    })->name('proximamente');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
