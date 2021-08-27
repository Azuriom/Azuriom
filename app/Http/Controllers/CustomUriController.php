<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\CustomRedirect;
use Azuriom\Models\Page;
use Illuminate\Http\Request;

class CustomUriController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function get(Request $request)
    {

        /**
         * @var Page $page
         */
        foreach (Page::enabled()->get() as $page) {
            if ($request->is($page->slug)) {
                return (new PageController())->show($page);
            }
        }

        /**
         * @var CustomRedirect $redirect
         */
        foreach (CustomRedirect::enabled()->get() as $redirect) {
            if ($request->is($redirect->slug)) {
                return redirect($redirect->target, $redirect->moved_permanently ? 301 : 302);
            }
        }

        abort(404);
    }
}
