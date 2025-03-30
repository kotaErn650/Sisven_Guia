<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Municipio</title>
  </head>
  <body>
    <div class="container">
        <h1>Agregar Nuevo Municipio</h1>
        <form action="{{ route('municipio.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="muni_nomb" class="form-label">Nombre del Municipio</label>
                <input type="text" class="form-control" id="muni_nomb" name="muni_nomb" required>
            </div>
            <div class="mb-3">
                <label for="depa_codi" class="form-label">Departamento</label>
                <select class="form-select" id="depa_codi" name="depa_codi" required>
                    <option value="">Seleccione un departamento</option>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('municipio.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>