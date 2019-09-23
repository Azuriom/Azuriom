<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Like;
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
        if (Like::where('post_id', $post->id)->where('author_id', Auth::id())->doesntExist()) {
            $like = new Like;
            $like->author_id = Auth::id();

            $post->likes()->save($like);
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
