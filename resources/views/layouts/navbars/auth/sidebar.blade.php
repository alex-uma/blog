@php
    $links = [
        [
            'header' => 'Perfil de Usuario',
        ],
        [
            'name' => 'Perfil',
            'icon' => 'fas fa-user',
            'route' => route('profile.show'),
            'active' => request()->routeIs('profile.show'),
        ],
        [
            'header' => 'Gestión de roles y permisos',
            'can' => ['Gestion de roles', 'Gestion de permisos'],
        ],
        [
            'name' => 'Privilegios',
            'icon' => 'fas fa-lock',
            'active' => request()->routeIs('admin.roles.*', 'admin.permissions.*'),
            'can' => ['Gestion de roles', 'Gestion de permisos'],
            'submenu' => [
                [
                    'name' => 'Roles',
                    'icon' => 'fa-regular fa-circle',
                    'route' => route('admin.roles.index'),
                    'active' => request()->routeIs('admin.roles.*'),
                ],
                [
                    'name' => 'Permisos',
                    'icon' => 'fa-regular fa-circle',
                    'route' => route('admin.permissions.index'),
                    'active' => request()->routeIs('admin.permissions.*'),
                ],
            ],
        ],
        [
            'header' => 'Menu de Administración',
        ],
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-table-columns',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
            'can' => ['Gestion de usuarios'],
        ],
        [
            'name' => 'Categorías',
            'icon' => 'fab fa-fw fa-buffer',
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
            'can' => ['Gestion de categorias'],
        ],
        [
            'name' => 'Etiquetas',
            'icon' => 'far fa-fw fa-bookmark',
            'route' => route('admin.tags.index'),
            'active' => request()->routeIs('admin.tags.*'),
            'can' => ['Gestion de etiquetas'],
        ],
        [
            'name' => 'Posts',
            'icon' => 'far fa-newspaper',
            'route' => route('admin.posts.index'),
            'active' => request()->routeIs('admin.posts.*'),
            'can' => ['Gestion de posts'],
        ],
    ];
@endphp
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'transform-none': open,
        '-translate-x-full': !open,
    }" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                @canany($link['can'] ?? [null])
                    <li>
                        @isset($link['header'])
                            <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">{{ $link['header'] }}</div>
                        @else
                            @isset($link['submenu'])
                                <div x-data="{ open: {{ $link['active'] ? 'true' : 'false' }}, }">
                                    <!-- Botón principal -->
                                    <button
                                        class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-300' : '' }}"
                                        x-on:click="open = !open">
                                        <span class="inline-flex w-6 h-6 justify-center items-center"><i
                                                class="{{ $link['icon'] }} text-gray-500"></i></span>
                                        <span class="ms-3 text-left flex-1">{{ $link['name'] }}</span>
                                        <i class="fa-solid fa-angle-down"
                                            :class="{
                                                'fa-angle-down': !open,
                                                'fa-angle-up': open,
                                            }"></i>
                                    </button>

                                    <!-- Submenu con separación -->
                                    <ul x-show="open" x-cloak class="mt-2 pl-6">
                                        @foreach ($link['submenu'] as $item)
                                            <li>
                                                <a href="{{ $item['route'] }}"
                                                    class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $item['active'] ? 'bg-gray-300' : '' }}">
                                                    <span class="inline-flex w-6 h-6 justify-center items-center"><i
                                                            class="{{ $item['icon'] }} text-gray-500"></i></span>
                                                    <span class="ms-3 text-left flex-1">{{ $item['name'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <a href="{{ $link['route'] }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-300' : '' }}">
                                    <span class="inline-flex w-6 h-6 justify-center items-center"><i
                                            class="{{ $link['icon'] }} text-gray-500"></i></span>
                                    <span class="ms-3">{{ $link['name'] }}</span>
                                </a>
                            @endisset
                        @endisset

                    </li>
                @endcanany
            @endforeach

        </ul>
    </div>
</aside>
