<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\PostResource;
use Azuriom\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Support\Responsable
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
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Support\Responsable
     */
    public function show(Post $post)
    {
        abort_if(! $post->isPublished(), 404);

        return new PostResource($post->load(['comments', 'author']));
    }
}
