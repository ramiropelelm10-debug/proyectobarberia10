<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - Barbero</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .success { color: green; }
        .profile { margin-bottom: 20px; }
        a { text-decoration: none; color: blue; margin-right: 10px; }
    </style>
</head>
<body>

<h1>Mi Perfil</h1>

@if (session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

<div class="profile">
    <p><strong>Nombre:</strong> {{ $barbero->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $barbero->apellido }}</p>
    <p><strong>Email:</strong> {{ $barbero->email }}</p>
    <p><strong>Especialidad:</strong> {{ $barbero->especialidad }}</p>
</div>

<a href="{{ route('barbero.perfil.edit') }}">✏️ Editar perfil</a>
<a href="{{ route('barbero.reservas.index') }}">📅 Mis Reservas</a>
<a href="{{ route('barbero.horarios.index') }}">⏰ Mis Horarios</a>

</body>
</html>
