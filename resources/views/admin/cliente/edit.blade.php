<form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
    </div>
    <div class="mb-3">
        <label for="email">Correo</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
    </div>
    <div class="mb-3">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
