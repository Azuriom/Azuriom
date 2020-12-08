<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\PageRequest;
use Azuriom\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index', ['pages' => Page::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create', [
            'pendingId' => old('pending_id', Str::uuid()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\PageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page();
        $data = $request->validated();

        save_translations($page, $data['translations']);      

        $page->update(Arr::except($data, 'translations'));
        $page->persistPendingAttachments($request->input('pending_id'));

        return redirect()->route('admin.pages.index')->with('success', trans('admin.pages.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\PageRequest  $request
     * @param  \Azuriom\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $data = $request->validated();
        save_translations($page, $data['translations']);

        $page->update(Arr::except($data, 'translations'));

        return redirect()->route('admin.pages.index')->with('success', trans('admin.pages.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Page  $page
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', trans('admin.pages.status.deleted'));
    }
}
