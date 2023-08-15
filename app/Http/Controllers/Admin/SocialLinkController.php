<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\SocialLinkRequest;
use Azuriom\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.social-links.index', [
            'links' => SocialLink::orderBy('position')->get(),
        ]);
    }

    /**
     * Update the order of the social links.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateOrder(Request $request)
    {
        $this->validate($request, [
            'links' => ['required', 'array'],
        ]);

        $links = $request->input('links');

        $position = 1;

        foreach ($links as $link) {
            SocialLink::whereKey($link)->update(['position' => $position++]);
        }

        SocialLink::clearCache();

        return response()->json([
            'message' => trans('messages.status.success'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-links.create', ['types' => SocialLink::types()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialLinkRequest $request)
    {
        SocialLink::create($request->validated());

        return to_route('admin.social-links.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.edit', [
            'link' => $socialLink,
            'types' => SocialLink::types(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());

        return to_route('admin.social-links.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return to_route('admin.social-links.index')
            ->with('success', trans('messages.status.success'));
    }
}
