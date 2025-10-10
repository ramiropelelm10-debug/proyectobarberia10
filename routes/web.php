<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plantilla', function () {
    return view('admin.layouts.main');
});



use App\Http\Controllers\BarberoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;


Route::resource('cliente', ClienteController::class);

Route::resource('barbero', BarberoController::class);




