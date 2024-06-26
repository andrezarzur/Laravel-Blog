<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest('posts.created_at')->with('category', 'author')
                ->filter(request(['search', 'category', 'author']))
                ->paginate(3)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }
}
