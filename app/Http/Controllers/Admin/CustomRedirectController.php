<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\CustomRedirectRequest;
use Azuriom\Models\CustomRedirect;
use Illuminate\Support\Str;

class CustomRedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.redirects.index', ['redirects' => CustomRedirect::paginate(25)]);
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
     * @param  \Azuriom\Http\Requests\CustomRedirectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomRedirectRequest $request)
    {
        $customRedirect = CustomRedirect::create($request->validated());

        $customRedirect->persistPendingAttachments($request->input('pending_id'));

        return redirect()->route('admin.redirects.index')->with('success', trans('admin.redirect.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\CustomRedirect  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomRedirect $redirect)
    {
        return view('admin.redirects.edit', ['redirect' => $redirect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\CustomRedirectRequest  $request
     * @param  \Azuriom\Models\CustomRedirect  $redirect
     * @return \Illuminate\Http\Response
     */
    public function update(CustomRedirectRequest $request, CustomRedirect $redirect)
    {
        $redirect->update($request->validated());

        return redirect()->route('admin.redirects.index')->with('success', trans('admin.redirect.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\CustomRedirect  $redirect
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(CustomRedirect $redirect)
    {
        $redirect->delete();

        return redirect()->route('admin.redirects.index')->with('success', trans('admin.redirect.status.deleted'));
    }
}
