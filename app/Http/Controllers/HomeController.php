<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        $posts = Post::where('published', true)
            ->filter(request()->all())
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.index', compact('posts', 'categories'));
    }
}
