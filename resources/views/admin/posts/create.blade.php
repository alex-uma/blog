<x-app-layout :breadcrumb="[
    [
        'name' => 'Lista de Post',
        'url' => route('admin.posts.index'),
    ],
    [
        'name' => 'Crear Post',
    ],
]">

    <h1 class="text-center text-xl font-semibold text-gray-600 mb-4">
        Crear nuevo Post
    </h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" x-data="data()" x-init="$watch('title', value => { string_to_slug(value) })">

        @csrf

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Título del artículo
            </x-label>

            <x-input name="title" value="{{ old('title') }}" x-model="title" class="w-full"
                placeholder="Ingrese el nombre del artículo" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Slug
            </x-label>

            <x-input name="slug" value="{{ old('slug') }}" x-model="slug" class="w-full"
                placeholder="Ingrese el slug del articulo" />
        </div>

        <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Categoría
            </label>
            <div class="relative">
                <select id="category" name="category_id"
                    class="block w-full px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7l3-3m0 0l3 3m-3-3v12" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <x-button>
                Crear artículo
            </x-button>
        </div>

    </form>

    @push('js')
        <script>
            function data() {
                return {
                    title: '',
                    slug: '',
                    string_to_slug(str) {
                        str = str.replace(/^\s+|\s+$/g, '');
                        str = str.toLowerCase();
                        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                        var to = "aaaaeeeeiiiioooouuuunc------";
                        for (var i = 0, l = from.length; i < l; i++) {
                            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                        }
                        str = str.replace(/[^a-z0-9 -]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                        this.slug = str;
                    }
                }
            }
        </script>
    @endpush

</x-app-layout>
