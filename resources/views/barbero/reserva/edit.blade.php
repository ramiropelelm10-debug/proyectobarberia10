@extends('admin.layouts.main')

@section('title', 'Reservas')

@section('content')
<h1>Editar Reserva</h1>

<form action="{{ route('barbero.reservas.update', [$user_id,$reserva->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Cliente:</label><br>
    <p> {{ $reserva->cliente->nombre }}</p><br><br>

    <label>Servicio:</label><br>
    <input type="text" name="servicio" value="{{ $reserva->servicio }}" required><br><br>

    <label>Fecha y hora:</label><br>
    <p> {{ \Carbon\Carbon::parse($reserva->fecha_hora)->format('Y-m-d\TH:i') }}</p><br>

    <label>Estado:</label><br>
    <select name="estado">
        <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="confirmada" {{ $reserva->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
        <option value="cancelada" {{ $reserva->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('barbero.reservas.index',$user_id) }}">Volver</a>
@endsection
