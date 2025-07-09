<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');

        $posts = Post::published()
            ->with('author')
            ->when($search, fn (Builder $q) => $q->scopes(['search' => $search]))
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->get();

        return view('posts.index', [
            'posts' => $posts,
            'search' => $search,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Post $post)
    {
        $post->load([
            'author', 'comments.author',
            'likes.author' => fn (Builder $query) => $query->without('role'),
        ]);

        $this->authorize('view', $post);

        return view('posts.show', ['post' => $post]);
    }
}
