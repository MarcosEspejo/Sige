<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal')->name ('home');
});

Route::prefix('egresados')->name('egresados.')->group(function () {
  
});

Route::prefix('jefe-egresados')->name('jefe_egresados.')->group(function () {

     Route::get('/alerta', [JefeEgresadoController::class, 'mostrarAlerta'])->name('alerta');
    Route::get('/enviar-alerta', [JefeEgresadoController::class, 'mostrarFormulario'])->name('enviar.alerta');
    Route::post('/send-alert', [JefeEgresadoController::class, 'sendAlert'])->name('send.alert');
    Route::get('/alertas', [JefeEgresadoController::class, 'alertasEnviadas'])->name('alertas.index');
    Route::get('/alertas/{notification}/edit', [JefeEgresadoController::class, 'editAlerta'])->name('alertas.edit');
    Route::put('/alertas/{notification}', [JefeEgresadoController::class, 'updateAlerta'])->name('alertas.update');
    Route::delete('/alertas/{notification}', [JefeEgresadoController::class, 'destroyAlerta'])->name('alertas.destroy');



});
   
    // Alertas
    Route::get('/alerta', [JefeEgresadoController::class, 'mostrarAlerta'])->name('alerta');
    Route::get('/enviar-alerta', [JefeEgresadoController::class, 'mostrarFormulario'])->name('enviar.alerta');
    Route::post('/send-alert', [JefeEgresadoController::class, 'sendAlert'])->name('send.alert');
    Route::get('/alertas', [JefeEgresadoController::class, 'alertasEnviadas'])->name('alertas.index');
    Route::get('/alertas/{notification}/edit', [JefeEgresadoController::class, 'editAlerta'])->name('alertas.edit');
    Route::put('/alertas/{notification}', [JefeEgresadoController::class, 'updateAlerta'])->name('alertas.update');
    Route::delete('/alertas/{notification}', [JefeEgresadoController::class, 'destroyAlerta'])->name('alertas.destroy');

        // Egresados por carrera
    Route::get('/egresados/carrera/{carrera}', [JefeEgresadoController::class, 'egresadosPorCarrera'])->name('egresadosPorCarrera');

        // Importación de Excel - MODIFICADA
    Route::post('/importar-excel', [JefeEgresadoController::class, 'importExcel'])->name('import.excel');

        // Plantilla
    Route::get('/descargar-plantilla', [JefeEgresadoController::class, 'descargarPlantilla'])->name('descargar.plantilla');

        // Rutas para ver y editar egresados
    Route::get('/egresados/{egresado}', [JefeEgresadoController::class, 'show'])->name('egresados.show');
    Route::get('/egresados/{egresado}/edit', [JefeEgresadoController::class, 'edit'])->name('egresados.edit');
    



