<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comidas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Listado de Comidas</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('comidas.create') }}" class="btn btn-primary">Nueva Comida</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($comidas->isEmpty())
            <div class="alert alert-info">No hay comidas registradas.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Costo</th>
                            <th>Detalle</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comidas as $comida)
                            <tr>
                                <td>{{ $comida->id_comida }}</td>
                                <td>{{ $comida->nombre_comida }}</td>
                                <td>{{ $comida->tipoComida->nombre_categoria ?? 'N/A' }}</td>
                                <td>${{ number_format($comida->costo, 2) }}</td>
                                <td>{{ Str::limit($comida->detalle_comida, 50) }}</td>
                                <td>
                                    <a href="{{ route('comidas.show', $comida->id_comida) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('comidas.edit', $comida->id_comida) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('comidas.destroy', $comida->id_comida) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
