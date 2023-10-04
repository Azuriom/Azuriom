<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Support\HtmlString;

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
            'message' => new HtmlString(setting('home_message')),
            'posts' => $posts,
        ]);
    }
}
