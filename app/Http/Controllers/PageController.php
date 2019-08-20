<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show(Page $page)
    {
        if (! $page->is_published && (auth()->guest() || ! auth()->user()->isAdmin())) {
            abort(404);
        }

        return view('pages.show')->with('page', $page);
    }
}
