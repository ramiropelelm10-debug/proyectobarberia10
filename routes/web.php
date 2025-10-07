<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plantilla', function () {
    return view('admin.layouts.main');
});

use App\Http\Controllers\BarberoController;

Route::resource('barberos', BarberoController::class);
