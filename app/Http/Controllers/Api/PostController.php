<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\PostResource;
use Azuriom\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::published()
            ->with('author')
            ->latest('published_at')
            ->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        abort_if(! $post->isPublished(), 404);

        return new PostResource($post->load(['comments', 'author']));
    }
}
