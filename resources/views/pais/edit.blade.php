<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar País</title>
  </head>
  <body>
    <div class="container">
        <h1>Editar País</h1>
        <form action="{{ route('pais.update', ['pais' => $pais->pais_codi]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pais_codi" class="form-label">Código del País</label>
                <input type="text" class="form-control" id="pais_codi" name="pais_codi" value="{{ $pais->pais_codi }}" readonly>
            </div>
            <div class="mb-3">
                <label for="pais_nomb" class="form-label">Nombre del País</label>
                <input type="text" class="form-control" id="pais_nomb" name="pais_nomb" value="{{ $pais->pais_nomb }}" required>
            </div>
            <div class="mb-3">
                <label for="pais_capi" class="form-label">Código de Capital</label>
                <input type="number" class="form-control" id="pais_capi" name="pais_capi" value="{{ $pais->pais_capi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pais.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>