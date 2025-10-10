@extends('admin.layouts.main')

@section('title', 'Servicios')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Título de la página -->
                <div class="card-title">Listado de Servicios</div>

                <!-- Botón para crear un nuevo servicio -->
                <a href="{{ route('servicio.create') }}" class="btn btn-primary">Nuevo Servicio</a>
            </div>
        </div>

        <div class="card-body">
            <!-- Tabla que muestra los servicios -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->id }}</td>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->precio }}</td>
                            <td>
                                <!-- Botón para editar el servicio -->
                                <a href="{{ route('servicio.edit', $servicio->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                    Editar
                                </a>

                                <!-- Formulario para eliminar el servicio -->
                                <form action="{{ route('servicio.destroy', $servicio->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación (Bootstrap 5) -->
            {{ $servicios->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SweetAlert para confirmación de eliminación -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains('btn-eliminar')) {
                    e.preventDefault();
                    const form = e.target.closest('form');
                    Swal.fire({
                        title: '¿Estás seguro de eliminar el servicio?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>
@endsection
