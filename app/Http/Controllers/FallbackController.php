<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Page;
use Azuriom\Models\Redirect;

class FallbackController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $path
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function get(string $path)
    {
        $redirect = Redirect::enabled()->firstWhere('slug', $path);

        if ($redirect !== null) {
            return redirect($redirect->target, $redirect->moved_permanently ? 301 : 302);
        }

        $page = Page::enabled()->where('slug', $path)->firstOrFail();

        $this->authorize('view', $page);

        return view('pages.show', ['page' => $page]);
    }
}
