<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg p-6">
                
                <!-- Barra de navegación -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <a href="{{ url('/profile') }}" class=" font-semibold py-2 px-4 rounded shadow">
                        Ir a Perfil 🧑‍💼
                    </a>
                    <a href="{{ url('/comunas') }}" class="  font-semibold py-2 px-4 rounded shadow ">
                        Ir a Comunas 🌐
                    </a>
                </div>

                <!-- Encabezado y botón -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Listado de Categorías</h3>
                    <a href="{{ route('categories.create') }}" class="mt-2 sm:mt-0 bg-blue-600 hover:bg-blue-700font-medium py-2 px-4 rounded shadow">
                        + Nueva Categoría
                    </a>
                </div>

                <!-- Tabla de Categorías -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left border border-gray-100">
                        <thead class="bg-gray-100 text-gray-700 uppercase">
                            <tr>
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Nombre</th>
                                <th class="py-3 px-4 border-b text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:underline font-medium">
                                                Editar
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta categoría?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline font-medium">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4 text-center text-gray-500">
                                        No hay categorías registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
