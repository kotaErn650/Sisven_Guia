<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <nav class="navbar bg-cyan-950">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='http://127.0.0.1:8000/usuario'">IR a Usuarios</button>
            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="window.location.href='http://127.0.0.1:8000/municipio'">Ir a Municipios🔜</button>
            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="window.location.href='http://127.0.0.1:8000/pais">Ir a Pais 🏴</button>
        </form>
    </nav>
    <div class="container">
        <h1>Listado de Comunas</h1>
        <a href="{{ route('comuna.new') }}" class="btn btn-primary">Agregar Comuna</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope ="col">Code</th>
                    <th scope ="col">Commune</th>
                    <th scope ="col">Municipality</th>
                    <th scope ="col">Actions</th>
                </tr>
                <tbody>
                    @foreach($comunas as $comuna)
                    <tr>
                        <th scope="row">{{$comuna-> comu_codi}}</th>
                        <td>{{$comuna-> comu_nomb}}</td>
                        <td>{{$comuna-> muni_nomb}}</td>
                        <td>
                            <a href="{{ route('comuna.edit', ['comuna' => $comuna->comu_codi]) }}" class="btn btn-info">Edit</a></li>

                            <form action="{{ route('comuna.destroy', ['comuna' => $comuna->comu_codi]) }}"
                                method= 'POST' style="display :inline-block"
                                onsubmit="return confirm('¿Seguro que quieres eliminar esta comuna?')" >
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
            
        </table>
    </div>

    

    











    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

  </body>
</html>