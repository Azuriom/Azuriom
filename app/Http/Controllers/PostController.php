<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Support\Facades\Auth;

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
            ->orderBy('is_pinned', 'desc')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with(['author', 'comments.author', 'likes.author'])->where('slug', $slug)->firstOrFail();

        if ($post->image_id !== null) {
            $post->loadMissing('image');
        }

        if (! $post->isPublished() && (Auth::guest() || ! Auth::user()->isAdmin())) {
            abort(404);
        }

        return view('posts.show')->with('currentPost', $post);
    }
}
