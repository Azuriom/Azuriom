<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('home', [
            'message' => setting('home_message'),
            'posts' => $posts,
        ]);
    }
}
