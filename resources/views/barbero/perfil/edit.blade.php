<h1>Editar Perfil</h1>

<form action="{{ route('barbero.perfil.update') }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ old('nombre', $barbero->nombre) }}" required><br><br>

    <label>Apellido:</label><br>
    <input type="text" name="apellido" value="{{ old('apellido', $barbero->apellido) }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $barbero->email) }}" required><br><br>

    <label>Especialidad:</label><br>
    <input type="text" name="especialidad" value="{{ old('especialidad', $barbero->especialidad) }}" required><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<a href="{{ route('barbero.perfil.show') }}">Volver al perfil</a>
