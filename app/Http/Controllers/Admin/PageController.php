<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\PageRequest;
use Azuriom\Models\Page;
use Azuriom\Models\Role;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.index', ['pages' => Page::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create', [
            'pendingId' => old('pending_id', Str::uuid()),
            'roles' => Role::orderByDesc('power')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $page = Page::create($request->validated());

        $page->persistPendingAttachments($request->input('pending_id'));
        $page->roles()->sync($request->input('roles'));

        return to_route('admin.pages.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
            'roles' => Role::orderByDesc('power')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());
        $page->roles()->sync($request->input('roles'));

        return to_route('admin.pages.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return to_route('admin.pages.index')
            ->with('success', trans('messages.status.success'));
    }
}
