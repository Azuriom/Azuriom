<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Page;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Azuriom\Models\Page  $page
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Page $page)
    {
        $this->authorize('view', $page);

        return view('pages.show', ['page' => $page]);
    }
}
