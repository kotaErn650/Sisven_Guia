<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Listado de Comunas') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                
                <!-- Barra de navegación -->
                <div class="flex justify-between items-center bg-slate-600 p-4 rounded-md mb-6">
                <div class="flex gap-2">
                    <button onclick="window.location.href='{{ url('/profile') }}'" class="bg-green-600 hover:bg-green-700 text-black font-semibold py-2 px-4 rounded">
                        Ir a Perfil 🥸
                    </button>
                    <button onclick="window.location.href='{{ url('/categories') }}'" class="bg-slate-800 hover:bg-slate-700 text-black font-semibold py-2 px-4 rounded">
                        Ir a Categories 🏴
                    </button>
                    </div>
                </div>

                <!-- Botón Agregar -->
                <div class="flex justify-between items-center mb-4">
                    <a href="#" class="btn btn-primary">➕ Agregar Comuna</a>
                </div>

                <!-- Tabla de comunas -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre de Comuna</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comunas as $comuna)
                            <tr>
                                <th scope="row">{{ $comuna->comu_codi }}</th>
                                <td>{{ $comuna->comu_nomb }}</td>
                                <td>{{ $comuna->muni_nomb }}</td>
                                <td>
                                    <a href="{{ route('comunas.edit', ['comuna' => $comuna->comu_codi]) }}" class="btn btn-sm btn-info me-1">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('comunas.destroy', ['comuna' => $comuna->comu_codi]) }}" 
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta comuna?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay comunas registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
