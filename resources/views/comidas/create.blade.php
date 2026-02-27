<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Comida</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Registrar Nueva Comida</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('comidas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Por favor, revise los campos:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('comidas.store') }}" method="POST" class="needs-validation">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre_comida" class="form-label">Nombre de la Comida</label>
                        <input type="text" class="form-control @error('nombre_comida') is-invalid @enderror" 
                               id="nombre_comida" name="nombre_comida" value="{{ old('nombre_comida') }}" required>
                        @error('nombre_comida')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_tipo_comida" class="form-label">Categoría</label>
                        <select class="form-select @error('id_tipo_comida') is-invalid @enderror" 
                                id="id_tipo_comida" name="id_tipo_comida" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach ($tiposComida as $tipo)
                                <option value="{{ $tipo->id_tipo_comida }}" {{ old('id_tipo_comida') == $tipo->id_tipo_comida ? 'selected' : '' }}>
                                    {{ $tipo->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_tipo_comida')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" step="0.01" class="form-control @error('costo') is-invalid @enderror" 
                               id="costo" name="costo" value="{{ old('costo') }}" required>
                        @error('costo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detalle_comida" class="form-label">Detalle</label>
                        <textarea class="form-control @error('detalle_comida') is-invalid @enderror" 
                                  id="detalle_comida" name="detalle_comida" rows="4" required>{{ old('detalle_comida') }}</textarea>
                        @error('detalle_comida')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('comidas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
