<x-app-layout :breadcrumb="[
    [
        'name' => 'Lista de Usuarios',
    ],
]">

    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Lista de Usuarios
    </h1>

    @if (session('info'))
        <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            href="{{ route('admin.users.create') }}">Nuevo</a>
    </div>

    @livewire('admin.users-index')

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
