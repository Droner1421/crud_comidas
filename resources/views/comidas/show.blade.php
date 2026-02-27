<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Comida</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Detalles de Comida</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('comidas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $comida->nombre_comida }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label"><strong>ID:</strong></label>
                                <p>{{ $comida->id_comida }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Categoría:</strong></label>
                                <p>{{ $comida->tipoComida->nombre_categoria ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label"><strong>Costo:</strong></label>
                                <p>${{ number_format($comida->costo, 2) }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Creado:</strong></label>
                                <p>{{ $comida->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Detalle:</strong></label>
                            <p>{{ $comida->detalle_comida }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Última actualización:</strong></label>
                            <p>{{ $comida->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('comidas.edit', $comida->id_comida) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('comidas.destroy', $comida->id_comida) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
