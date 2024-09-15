<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Page;
use Azuriom\Models\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FallbackController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function get(string $path)
    {
        /** @var \Azuriom\Models\Redirect|null $redirect */
        $redirect = Redirect::enabled()->firstWhere('source', $path);

        if ($redirect !== null) {
            return redirect($redirect->destination, $redirect->code);
        }

        $page = Page::enabled()->where('slug', $path)->first();

        if ($page === null) {
            throw (new ModelNotFoundException())->setModel(Page::class);
        }

        $this->authorize('view', $page);

        return view('pages.show', ['page' => $page]);
    }
}
