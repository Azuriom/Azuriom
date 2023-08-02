<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\RedirectRequest;
use Azuriom\Models\Redirect;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.redirects.index', ['redirects' => Redirect::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.redirects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RedirectRequest $request)
    {
        Redirect::create($request->validated());

        return to_route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Redirect $redirect)
    {
        return view('admin.redirects.edit', ['redirect' => $redirect]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RedirectRequest $request, Redirect $redirect)
    {
        $redirect->update($request->validated());

        return to_route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(Redirect $redirect)
    {
        $redirect->delete();

        return to_route('admin.redirects.index')
            ->with('success', trans('messages.status.success'));
    }
}
