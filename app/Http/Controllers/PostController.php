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
        $posts = Post::with(['author', 'image'])
            ->withCount('comments')
            ->scopes('published')
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->get();

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($slug)
    {
        $post = Post::with(['author', 'comments.author', 'likes.author'])->where('slug', $slug)->firstOrFail();

        $this->authorize('view', $post);

        if ($post->image_id !== null) {
            $post->loadMissing('image');
        }

        return view('posts.show')->with('currentPost', $post);
    }
}
