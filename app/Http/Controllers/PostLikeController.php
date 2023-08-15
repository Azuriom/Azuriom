<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function addLike(Request $request, Post $post)
    {
        if (! $post->likes()->where('author_id', $request->user()->id)->exists()) {
            $post->likes()->create();
        }

        return $request->expectsJson() ? response()->json([
            'likes' => $post->likes()->count(),
            'liked' => true,
        ]) : to_route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function removeLike(Request $request, Post $post)
    {
        $post->likes()->where('author_id', $request->user()->id)->delete();

        return $request->expectsJson() ? response()->json([
            'likes' => $post->likes()->count(),
            'liked' => false,
        ]) : to_route('posts.show', $post);
    }
}
