<x-app-layout :breadcrumb="[
    [
        'name' => 'Lista de Usuarios',
        'url' => route('admin.permissions.index'),
    ],
    [
        'name' => 'Crear Permiso',
    ],
]">

    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Crear nuevo Permiso
    </h1>

    <div class="p-6">
        <!-- Formulario para crear un nuevo permiso -->
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf

            <!-- Campo para el nombre del permiso -->
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre del Permiso
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingrese el nombre del permiso" />
                <span class="text-sm text-red-600">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Botón de acción -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear Permiso
                </button>
            </div>
        </form>
    </div>

</x-app-layout>