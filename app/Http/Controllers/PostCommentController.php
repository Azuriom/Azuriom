<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Requests\CommentRequest;
use Azuriom\Models\Comment;
use Azuriom\Models\Post;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Post $post)
    {
        $post->comments()->create($request->validated());

        return to_route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('view', $post);

        abort_unless($comment->post_id === $post->id, 404);

        $this->authorize('delete', $comment);

        $comment->delete();

        return to_route('posts.show', $post);
    }
}
