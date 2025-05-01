<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Communes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <nav class="navbar bg-slate-600 mb-4">
                    <form class="container-fluid justify-content-start">
                        <button class="btn btn-outline-success me-2" type="button" 
                            onclick="window.location.href='http://127.0.0.1:8000/profile'">
                            IR a Perfil🥸
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" type="button" 
                            onclick="window.location.href='http://127.0.0.1:8000/comunas'">
                            Ir a Comuna🏴
                        </button>
                    </form>
                </nav>

                <h1>Listado de Comunas</h1>
                <a href="" class="btn btn-primary mb-3">Agregar Comuna</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Commune</th>
                            <th scope="col">Municipality</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comunas as $comuna)
                        <tr>
                            <th scope="row">{{ $comuna->comu_codi }}</th>
                            <td>{{ $comuna->comu_nomb }}</td>
                            <td>{{ $comuna->muni_nomb }}</td>
                            <td>
                            <a href="{{ route('comunas.edit', ['comuna' => $comuna->comu_codi]) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('comunas.destroy', ['comuna' => $comuna->comu_codi]) }}" 
                                    method="POST" style="display: inline-block;" 
                                    onsubmit="return confirm('¿Seguro que quieres eliminar esta comuna?')">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
