<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\RedirectRequest;
use Azuriom\Models\Redirect;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.redirects.index', ['redirects' => Redirect::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.redirects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RedirectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RedirectRequest $request)
    {
        Redirect::create($request->validated());

        return redirect()->route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Redirect  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Redirect $redirect)
    {
        return view('admin.redirects.edit', ['redirect' => $redirect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RedirectRequest  $request
     * @param  \Azuriom\Models\Redirect  $redirect
     * @return \Illuminate\Http\Response
     */
    public function update(RedirectRequest $request, Redirect $redirect)
    {
        $redirect->update($request->validated());

        return redirect()->route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Redirect  $redirect
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Redirect $redirect)
    {
        $redirect->delete();

        return redirect()->route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }
}
