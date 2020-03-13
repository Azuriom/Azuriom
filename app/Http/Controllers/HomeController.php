<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Illuminate\Http\Request;

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
            return redirect()->home();
        }

        if ($request->user() !== null && $request->user()->can('maintenance.access')) {
            return redirect()->home();
        }

        $maintenanceMessage = setting('maintenance-message', trans('messages.maintenance-message'));

        return view('maintenance', [
            'maintenanceMessage' => $maintenanceMessage,
        ]);
    }
}
