<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Países</title>
  </head>
  <body>
    <nav class="navbar bg-cyan-950">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/comuna'">IR a Comunas</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/municipio'">IR a Municipios</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/departamento'">IR a Departamentos</button>
        </form>
    </nav>
    <div class="container">
        <h1>Wllcome To C0UnT®y</h1>
        <a href="{{ route('pais.new') }}" class="btn btn-primary">Agregar País</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais)
                <tr>
                    <td>{{ $pais->pais_codi }}</td>
                    <td>{{ $pais->pais_nomb }}</td>
                    <td>{{ $pais->pais_capi }}</td>
                    <td>
                        <a href="{{ route('pais.edit', ['pais' => $pais->pais_codi]) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('pais.destroy', ['pais' => $pais->pais_codi]) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este país?')">
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