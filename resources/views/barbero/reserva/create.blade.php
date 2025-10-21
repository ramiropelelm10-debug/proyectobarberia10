<h1>Crear Reserva</h1>

<form action="{{ route('barbero.reservas.store') }}" method="POST">
    @csrf

    <input type="hidden" name="barbero_id" value="{{ $barbero_id }}">

    <label>Cliente:</label><br>
    <input type="text" name="cliente" required><br><br>

    <label>Servicio:</label><br>
    <input type="text" name="servicio" required><br><br>

    <label>Fecha y hora:</label><br>
    <input type="datetime-local" name="fecha_hora" required><br><br>

    <label>Estado:</label><br>
    <select name="estado" required>
        <option value="pendiente">Pendiente</option>
        <option value="confirmada">Confirmada</option>
        <option value="cancelada">Cancelada</option>
    </select><br><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('barbero.reservas.index') }}">Volver</a>
