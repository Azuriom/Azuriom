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
        $homeMessage = setting('home_message');

        return view('home', [
            'message' => $homeMessage ? new HtmlString($homeMessage) : null,
            'posts' => $posts,
        ]);
    }
}
