<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function addLike(Request $request, Post $post)
    {
        $userId = auth()->user()->id;

        if (Like::where('post_id', $post->id)->where('author_id', $userId)->doesntExist()) {
            $like = new Like;
            $like->post_id = $post->id;
            $like->author_id = $userId;
            $like->save();
        }

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function removeLike(Post $post)
    {
        Like::where('post_id', $post->id)->where('author_id', auth()->user()->id)->delete();

        return redirect()->route('posts.show', $post->slug);
    }
}
