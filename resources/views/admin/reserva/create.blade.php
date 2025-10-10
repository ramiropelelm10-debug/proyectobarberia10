@extends('admin.layouts.main')

@section('title', 'Nueva Reserva')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Completar el formulario para añadir una nueva reserva</div>
        </div>

        <!-- Formulario para crear nueva reserva -->
        <form action="{{ route('reserva.store') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->

            <div class="card-body">
                <!-- Seleccionar cliente -->
                <div class="mb-3">
                    <label for="cliente_id" class="form-label @error('cliente_id') is-invalid @enderror">Cliente</label>
                    <select name="cliente_id" class="form-select" id="cliente_id" required>
                        <option value="" disabled selected hidden>Seleccione un cliente</option>
                        @foreach ($clientes as $cliente)
                            <!-- Se mantiene la opción seleccionada en caso de error -->
                            <option value="{{ $cliente->id }}" @selected(old('cliente_id') == $cliente->id)>
                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Seleccionar barbero -->
                <div class="mb-3">
                    <label for="barbero_id" class="form-label @error('barbero_id') is-invalid @enderror">Barbero</label>
                    <select name="barbero_id" class="form-select" id="barbero_id" required>
                        <option value="" disabled selected hidden>Seleccione un barbero</option>
                        @foreach ($barberos as $barbero)
                            <option value="{{ $barbero->id }}" @selected(old('barbero_id') == $barbero->id)>
                                {{ $barbero->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('barbero_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fecha y hora de la reserva -->
                <div class="mb-3">
                    <label for="fecha_hora" class="form-label @error('fecha_hora') is-invalid @enderror">Fecha y Hora</label>
                    <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control"
                        value="{{ old('fecha_hora') }}" required>
                    @error('fecha_hora')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado de la reserva -->
                <div class="mb-3">
                    <label for="estado" class="form-label @error('estado') is-invalid @enderror">Estado</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="pendiente" @selected(old('estado') == 'pendiente')>Pendiente</option>
                        <option value="confirmada" @selected(old('estado') == 'confirmada')>Confirmada</option>
                        <option value="cancelada" @selected(old('estado') == 'cancelada')>Cancelada</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Botones para enviar o cancelar -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('reserva.index') }}" class="btn float-end">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
