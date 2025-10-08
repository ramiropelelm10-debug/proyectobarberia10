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

Route::resource('barbero', BarberoController::class);

Route::resource('cliente', ClienteController::class);
