<?php

namespace Azuriom\Http\Controllers;

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
}
