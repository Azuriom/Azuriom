<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\Post as PostResource;
use Azuriom\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::with('author')->get());
    }

    /**
     * Display the specified resource.
     * @param  Post  $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post->load(['comments', 'author']));
    }
}
