@extends('admin.layouts.main')

@section('title', 'Nueva Factura')

@section('content')
<div class="card card-primary card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Completar el formulario para añadir una nueva factura</div>
    </div>

    <!-- Formulario para crear factura -->
    <form action="{{ route('factura.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <!-- Seleccionar cliente -->
            <div class="mb-3">
                <label for="id_cliente" class="form-label @error('id_cliente') is-invalid @enderror">Cliente</label>
                <select name="id_cliente" class
