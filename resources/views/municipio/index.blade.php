<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Municipios</title>
  </head>
  <body>
    <nav class="navbar bg-cyan-950">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/comuna'">IR a Comunas</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/departamento'">IR a Departamentos</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/pais'">IR a Paises</button>
        </form>
    </nav>
    <div class="container">
        <h1>Wllcome To Municipality</h1>
        <a href="{{ route('municipio.new') }}" class="btn btn-primary">Agregar Municipio</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($municipios as $municipio)
                <tr>
                    <td>{{ $municipio->muni_codi }}</td>
                    <td>{{ $municipio->muni_nomb }}</td>
                    <td>{{ $municipio->departamento->depa_nomb ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('municipio.edit', ['municipio' => $municipio->muni_codi]) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('municipio.destroy', ['municipio' => $municipio->muni_codi]) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este municipio?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>