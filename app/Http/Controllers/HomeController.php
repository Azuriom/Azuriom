<?php

namespace Azuriom\Http\Controllers;

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
        return view('home');
    }

    public function maintenance()
    {
        if (! setting('maintenance')) {
            return redirect()->to('home');
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
