<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

    public function locale($locale)
    {
        abort_unless(in_array($locale, get_selected_locales_codes(), true), 401);

        if (auth()->check()) {
            $user = auth()->user();
            $user->locale = $locale;
            $user->save();
        } else {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
