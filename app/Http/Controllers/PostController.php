<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->with('author')->withCount('comments')->get();

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (! $post->isPublished() && (auth()->guest() || ! auth()->user()->isAdmin())) {
            abort(404);
        }

        $currentPost = $post->load(['author', 'comments', 'likes']);

        return view('posts.show')->with('currentPost', $currentPost);
    }
}
