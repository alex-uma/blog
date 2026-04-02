<x-app-layout :breadcrumb="[
    [
        'name' => 'Lista de Etiquetas',
        'url' => route('admin.tags.index'),
    ],
    [
        'name' => 'Crear Etiqueta',
        'url' => route('admin.tags.create'),
    ],
    [
        'name' => 'Editar Etiqueta',
    ],
]">

    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Editar Usuario
    </h1>

    @if (session('info'))
        <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="p-6">
        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre de la Etiqueta
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $tag->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <span class="text-sm text-red-600">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="flex justify-end">
                <button type="button" onclick="event.preventDefault(); document.getElementById('formDelete').submit();"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Eliminar
                </button>
                <button type="submit"
                    class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Actualizar
                </button>
            </div>

        </form>

        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" id="formDelete">
            @csrf
            @method('DELETE')
        </form>

    </div>

    @push('js')
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = 0;
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    @endpush

</x-app-layout>