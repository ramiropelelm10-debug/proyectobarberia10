<h1>Detalle de la Reserva</h1>

<p><strong>ID:</strong> {{ $reserva->id }}</p>
<p><strong>Cliente:</strong> {{ $reserva->cliente }}</p>
<p><strong>Servicio:</strong> {{ $reserva->servicio }}</p>
<p><strong>Fecha y hora:</strong> {{ $reserva->fecha_hora }}</p>
<p><strong>Estado:</strong> {{ ucfirst($reserva->estado) }}</p>

<a href="{{ route('barbero.reservas.edit', $reserva->id) }}">Editar</a> |
<a href="{{ route('barbero.reservas.index') }}">Volver</a>
