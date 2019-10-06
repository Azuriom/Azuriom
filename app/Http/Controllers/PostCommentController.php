<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Requests\CommentRequest;
use Azuriom\Models\Comment;
use Azuriom\Models\Post;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\CommentRequest  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CommentRequest $request, Post $post)
    {
        $this->authorize('create', Comment::class);

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
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $post->slug);
    }
}
