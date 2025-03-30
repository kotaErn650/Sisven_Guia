<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Departamento</title>
  </head>
  <body>
    <div class="container">
        <h1>Agregar Nuevo Departamento</h1>
        <form action="{{ route('departamento.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="depa_nomb" class="form-label">Nombre del Departamento</label>
                <input type="text" class="form-control" id="depa_nomb" name="depa_nomb" required>
            </div>
            <div class="mb-3">
                <label for="pais_codi" class="form-label">País</label>
                <select class="form-select" id="pais_codi" name="pais_codi" required>
                    <option value="">Seleccione un país</option>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>