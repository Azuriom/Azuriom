<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('author')->get();

        return view('posts.index')->with(['posts' => $post]);
    }

    public function show($slug)
    {
        $post = Post::with('author')->where('slug', $slug)->firstOrFail();

        return view('posts.show')->with(['currentPost' => $post]);
    }
}
