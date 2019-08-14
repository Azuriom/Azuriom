<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
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
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post, Comment $comment)
    {
        if ($comment->author_id !== Auth::id() && (! Auth::check() || ! auth()->user()->isAdmin())) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('posts.show', $post->slug);
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string']
        ];
    }
}
