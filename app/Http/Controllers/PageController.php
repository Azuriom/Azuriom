<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        if (! $page->is_published && (Auth::guest() || ! Auth::user()->isAdmin())) {
            abort(404);
        }

        return view('pages.show')->with('page', $page);
    }
}
