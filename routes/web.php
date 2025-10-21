<?php

use App\Http\Controllers\barbero\BarberoReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plantilla', function () {
    return view('admin.layouts.main');
});

Route::resource('cliente', ClienteController::class);

Route::resource('barbero', BarberoController::class);

Route::resource('factura', FacturaController::class);

Route::resource('servicio', ServicioController::class);

Route::resource('reserva', ReservaController::class);

Route::resource('barbero.reservas', BarberoReservaController::class);

//   ruta de reserva de barbero 
// http://localhost:8000/barbero/1/reservas