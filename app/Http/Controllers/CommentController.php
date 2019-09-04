<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, $this->rules());

        $comment = new Comment($request->all());
        $comment->author_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();

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
        if ($comment->author_id !== auth()->id() && (auth()->guest() || ! auth()->user()->isAdmin())) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('posts.show', $post->slug);
    }

    private function rules()
    {
        return [
            'content' => ['required', 'string']
        ];
    }
}
