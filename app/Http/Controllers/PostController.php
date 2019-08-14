<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with('author')->get();

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        if (!$post->isPublished() && (!Auth::check() || !auth()->user()->isAdmin())) {
            abort(404);
        }

        return view('posts.show')->with('currentPost', $post);
    }
}
