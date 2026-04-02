<x-app-layout :breadcrumb="[
    [
        'name' => 'Lista de Roles',
        'url' => route('admin.roles.index'),
    ],
    [
        'name' => 'Crear Rol',
    ],
]">

    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Crear nuevo Rol
    </h1>

    <div class="p-6">
        <!-- Formulario para crear un nuevo rol -->
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <!-- Campo para el nombre del rol -->
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre del Rol
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingrese el nombre del rol" />
                <span class="text-sm text-red-600">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Checkbox para los permisos -->
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Permisos
                </label>
                <ul>
                    @foreach ($permissions as $permission)
                        <li>
                            <label class="flex items-center">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    class="w-4 h-4 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">
                                    {{ $permission->name }}
                                </span>
                            </label>
                        </li>
                    @endforeach
                </ul>
                <span class="text-sm text-red-600">
                    @error('permissions')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Botón de acción -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear Rol
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
