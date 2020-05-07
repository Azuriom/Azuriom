<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Requests\CommentRequest;
use Azuriom\Models\Comment;
use Azuriom\Models\Post;

class PostCommentController extends Controller
{
    /**
     * Construct a new PostCommentController instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Comment::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\CommentRequest  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Post $post)
    {
        $post->comments()->create($request->validated());

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Comment  $comment
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $post);
    }
}
