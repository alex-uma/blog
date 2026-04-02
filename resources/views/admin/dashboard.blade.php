<x-app-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'url' => route('dashboard'),
    ],
    [
        'name' => 'Dashboard',
        'url' => route('dashboard'),
    ],
    [
        'name' => 'panel',
    ],
]">
    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Dashboard
    </h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <div class="text-center mb-2">
                <!-- Texto de bienvenida -->
                <p class="text-xl font-medium text-gray-600 dark:text-gray-300">¡Bienvenido!</p>
            </div>
            <div class="flex items-center">
                <!-- Imagen del usuario -->
                <img src="{{ asset('assets/img/user.png') }}" alt="{{ Auth::user()->name }}"
                    class="w-10 h-10 rounded-full mr-3">
                <!-- Nombre del usuario -->
                <p class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ auth()->user()->name }}
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p id="current-time" class="text-xl text-gray-600 dark:text-gray-500 font-bold">
                {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
            </p>
        </div>
        <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <div class="text-center mb-2">
                <!-- Titulo -->
                <p class="text-xl font-medium text-gray-600 dark:text-gray-300">Usuarios</p>
            </div>
            <div class="flex items-center">
                <i class="fas fa-users text-gray-500 me-4"></i>
                <p id="user-count" class="text-xl text-gray-600 dark:text-gray-500">
                    Registrados: <span class="font-bold text-gray-900 dark:text-white">0</span>
                </p>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function updateClock() {
                const now = new Date(); // Obtiene la fecha y hora actuales
                const formattedTime = now.toLocaleString('es-ES', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });

                document.getElementById('current-time').innerText = formattedTime; // Actualiza el contenido del div
            }

            // Actualiza cada segundo
            setInterval(updateClock, 1000);
        </script>

        <script>
            function updateUserCount() {
                fetch('/user-count') // Solicita el número de usuarios
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('user-count').innerHTML =
                            `Registrados: <span class="font-bold text-gray-900 dark:text-white">${data.count}</span>`;
                    });
            }

            // Actualiza cada 10 segundos
            setInterval(updateUserCount, 10000);
            updateUserCount(); // Llama a la función al cargar la página
        </script>
    @endpush

</x-app-layout>
