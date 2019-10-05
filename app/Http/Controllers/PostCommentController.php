<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Requests\PostRequest;
use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\PostRequest  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        $comment = new Comment($request->all());
        $comment->author_id = $request->user()->id;

        $post->comments()->save($comment);

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Comment  $comment
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post, Comment $comment)
    {
        if ($comment->author_id !== Auth::id() && (Auth::guest() || ! Auth::user()->isAdmin())) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('posts.show', $post->slug);
    }
}
