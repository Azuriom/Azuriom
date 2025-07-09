<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of published resources.
     *
     * If no search term is provided, all published resources are returned. If a search term is
     * provided via the 'search' query parameter, resources are filtered by title or description.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = Post::published()->with('author');

        $searchTerm = mb_strtolower($search, 'UTF-8');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'LIKE', "%{$searchTerm}%")
              ->orWhere('description', 'LIKE', "%{$searchTerm}%");
        });

        $posts = $query->orderByDesc('is_pinned')
                       ->latest('published_at')
                       ->paginate()
                       ->withQueryString();

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
