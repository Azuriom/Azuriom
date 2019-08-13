<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->get();

        return view('posts.index')->with(['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['currentPost' => $post]);
    }
}
