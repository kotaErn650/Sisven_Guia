<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                <!-- Barra de navegación -->
                <div class="flex justify-start gap-4 mb-6">
                    <a href="{{ url('/profile') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                        Ir a Perfil
                    </a>
                    <a href="{{ url('/comunas') }}" class="bg-slate-600 hover:bg-slate-700 text-white font-semibold py-2 px-4 rounded">
                        Ir a Comunas
                    </a>
                </div>

                <!-- Título y botón crear -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-700">Listado de Categorías</h3>
                    <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        + Nueva Categoría
                    </a>
                </div>

                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Nombre</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                    <td class="py-2 px-4 border-b flex gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:underline">Editar</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta categoría?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($categories->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">No hay categorías registradas.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            + Crear Nueva Categoría
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
