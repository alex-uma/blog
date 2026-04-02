<div>

    <div class="card-header p-4 border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-700 mb-6">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese nombre del Post">
        </div>
    </div>

    @if ($posts->count())

        <ul class="space-y-8">
            @foreach ($posts as $post)
                <li class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div>
                        <a href="{{ route('admin.posts.edit', $post) }}">
                            <img class="aspect-[16/9] object-cover object-center w-full rounded-lg shadow-xl dark:shadow-gray-800"
                                src="{{ $post->image }}" alt="post">
                        </a>
                    </div>

                    <div>
                        <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                            <a href="{{ route('admin.posts.edit', $post) }}">
                                {{ $post->title }}
                            </a>
                        </h1>

                        <hr class="mt-1 mb-2">

                        <span @class([
                            'bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300' =>
                                $post->published,
                            'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300' => !$post->published,
                        ])>
                            {{ $post->published ? 'Publicado' : 'Borrador' }}
                        </span>

                        <p class="mt-2 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            {{ Str::limit($post->excerpt, 100) }}
                        </p>

                        <div class="flex flex-wrap justify-end gap-2 mt-4 sm:flex-nowrap">
                            <a href="{{ route('admin.posts.edit', $post) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Editar
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Eliminar
                                </button>
                            </form>
                        </div>                        

                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <span class="font-medium">No hay ningún registro...</span>
        </div>
    @endif

</div>
