<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('author')
            ->scopes('published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', ['posts' => $posts]);
    }

    public function maintenance(Request $request)
    {
        if (! setting('maintenance-status', false)) {
            return redirect()->route('home');
        }

        if ($request->user() !== null && $request->user()->can('maintenance.access')) {
            return redirect()->route('home');
        }

        return view('maintenance');
    }

    public function assets(string $file)
    {
        $theme = setting('theme');

        if (strpos($file, '..') !== false || $theme === null) {
            abort(404);
        }

        try {
            return response()->file(theme_path($theme.'/assets/'.$file));
        } catch (FileNotFoundException $e) {
            abort(404);
        }
    }
}
