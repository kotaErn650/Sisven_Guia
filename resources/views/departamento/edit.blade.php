<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Departamento</title>
  </head>
  <body>
    <div class="container">
        <h1>Editar Departamento</h1>
        <form action="{{ route('departamento.update', ['departamento' => $departamento->depa_codi]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="depa_nomb" class="form-label">Nombre del Departamento</label>
                <input type="text" class="form-control" id="depa_nomb" name="depa_nomb" value="{{ $departamento->depa_nomb }}" required>
            </div>
            <div class="mb-3">
                <label for="pais_codi" class="form-label">País</label>
                <select class="form-select" id="pais_codi" name="pais_codi" required>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->pais_codi }}" {{ $pais->pais_codi == $departamento->pais_codi ? 'selected' : '' }}>
                            {{ $pais->pais_nomb }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>