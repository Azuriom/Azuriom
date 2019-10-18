<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function addLike(Post $post)
    {
       if (! $post->likes()->where('author_id', Auth::id())->exists()) {
            $post->likes()->create();
        }

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function removeLike(Post $post)
    {
        $post->likes()->where('author_id', Auth::id())->delete();

        return redirect()->route('posts.show', $post->slug);
    }
}
