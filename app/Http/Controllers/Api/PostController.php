<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\Post as PostResource;
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
        return PostResource::collection(Post::with('author')
            ->scopes('published')
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
