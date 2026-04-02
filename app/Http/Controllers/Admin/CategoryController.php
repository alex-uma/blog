<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:Gestion de categorias']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')
            ->paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('info', 'La categoría se creó correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->exists();

        if ($posts) {

            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'La categoría no se puede eliminar porque tiene posts asociadas.',
                'confirmButtonText' => 'Aceptar',
            ]);

            return redirect()->route('admin.categories.edit', $category);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó correctamente');
    }
}
