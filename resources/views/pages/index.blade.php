<x-guest-layout>

    <section class="bg-center bg-no-repeat bg-cover bg-gray-500 bg-blend-multiply"
        style="background-image: url('{{ asset('assets/img/portada.jpg') }}');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Bootcamp de Programación</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Un bootcamp de programación es
                un programa intensivo y de corta duración que enseña habilidades prácticas para trabajar en el sector de
                la programación.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('login') }}"
                    class="inline-flex justify-center items-center py-2 px-3 text-md font-medium text-white rounded-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Ingresar
                    <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex justify-center items-center py-2 px-3 text-md font-medium text-white rounded-md border border-white hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-400 sm:ms-4">
                    Registrarse
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white shadow dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 p-10">
            <h1 class="text-3xl text-center font-semibold mb-6 dark:text-white">
                Lista de Artículos
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Filtros -->
                <div class="col-span-1">
                    <form action="{{ route('home') }}">
                        <!-- Ordenar -->
                        <div class="mb-4">
                            <p class="text-lg font-semibold dark:text-white">Ordenar:</p>
                            <select name="order"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-800 dark:text-white">
                                <option value="new" @selected(request('order') == 'new')>Más nuevo</option>
                                <option value="old" @selected(request('order') == 'old')>Más antiguo</option>
                            </select>
                        </div>

                        <!-- Categorías -->
                        <div class="mb-4">
                            <p class="text-lg font-semibold dark:text-white">Categorías:</p>
                            <ul>
                                @foreach ($categories as $category)
                                    <li class="mb-2">
                                        <label
                                            class="flex items-center space-x-2 rtl:space-x-reverse dark:text-gray-300">
                                            <x-checkbox type="checkbox" name="category[]" value="{{ $category->id }}"
                                                :checked="in_array($category->id, request('category') ?? [])" />
                                            <span>{{ $category->name }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Botón de Aplicar Filtros -->
                        <x-button>
                            Aplicar Filtros
                        </x-button>
                    </form>
                </div>

                <!-- posts -->
                <div class="col-span-3">
                    <div class="space-y-6">
                        @foreach ($posts as $post)
                            <article class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Imagen -->
                                <figure class="rounded-lg overflow-hidden">
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover">
                                </figure>

                                <!-- Contenido -->
                                <div>
                                    <h1 class="text-xl font-semibold dark:text-white">
                                        {{ $post->title }}
                                    </h1>
                                    <hr class="mt-1 mb-2 border-gray-300 dark:border-gray-600">
                                    <div class="mb-2">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('home') . '?tag=' . $tag->name }}">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $tag->name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <p class="text-sm mb-2 text-gray-700 dark:text-gray-300">
                                        {{ $post->published_at->format('d M Y') }}
                                    </p>
                                    <div class="mb-4 text-gray-700 dark:text-gray-400">
                                        {{ Str::limit($post->excerpt, 100, '...') }}
                                    </div>
                                    <div>
                                        <a href="{{ route('posts.show', $post) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Leer Más
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>

            {{-- @if ($posts->hasPages())
            <div class="mt-6">

                {{ $posts->appends(request()->query())->links() }}

            </div>
        @endif --}}
        </div>


    </section>

</x-guest-layout>
