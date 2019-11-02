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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $this->authorize('view', $page);

        return view('pages.show', ['page' => $page]);
    }
}
