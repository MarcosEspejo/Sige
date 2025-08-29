<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use app\Http\Controllers\EgresadoController;
use app\Http\Controllers\JefeEgresadoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Auth\Events\Login;

Route::get('/', function () {
    return view('principal');
});
Route::get('login');
// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rutas protegidas para jefe de egresados
Route::middleware(['auth', 'role:jefeegresado'])->group(function () {
    Route::get('/jefe-egresados', [JefeEgresadoController::class, 'index'])
        ->name('jefe_egresados.index');

    // Importación y descarga
    Route::get('/jefe-egresados/plantilla', [JefeEgresadoController::class, 'descargarPlantilla'])
        ->name('jefe_egresados.descargar.plantilla');

    Route::post('/jefe-egresados/import', [JefeEgresadoController::class, 'importExcel'])
        ->name('jefe_egresados.import.excel');

    // CRUD egresados
    Route::get('/jefe-egresados/create', [EgresadoController::class, 'create'])
        ->name('jefe_egresados.create');

    Route::get('/jefe-egresados/{egresado}', [EgresadoController::class, 'show'])
        ->name('jefe_egresados.egresados.show');

    Route::get('/jefe-egresados/{egresado}/edit', [EgresadoController::class, 'edit'])
        ->name('jefe_egresados.egresados.edit');

    // Acciones rápidas
    Route::get('/jefe-egresados/dashboard', [JefeEgresadoController::class, 'dashboard'])
        ->name('jefe_egresados.dashboard');

    Route::get('/jefe-egresados/busqueda', [JefeEgresadoController::class, 'busquedaAvanzada'])
        ->name('jefe_egresados.busquedaAvanzada');

    Route::get('/jefe-egresados/alertas', [JefeEgresadoController::class, 'alertas'])
        ->name('jefe_egresados.alertas.index');

    // Logout (puedes usar el logout de Laravel Breeze directamente)
    Route::post('/jefe-egresados/logout', [JefeEgresadoController::class, 'logout'])
        ->name('jefe_egresados.logout');
});

// Rutas públicas
Route::get('/', function () {
    return view('principal');
});

require __DIR__.'/auth.php';
