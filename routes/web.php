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


Route::resource('clientes', ClienteController::class);

Route::resource('barbero', BarberoController::class);



// Rutas del CRUD de clientes (para tus vistas Blade de clientes)
Route::resource('clientes', ClienteController::class);


// Ruta para ver todos los clientes (index)
Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');

// Ruta para crear un cliente
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');

// Ruta para guardar un cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');

// Ruta para editar un cliente
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');

// Ruta para actualizar un cliente
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

// Ruta para eliminar un cliente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');



