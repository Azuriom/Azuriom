<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\NavbarElementRequest;
use Azuriom\Models\NavbarElement;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = NavbarElement::with('elements')
            ->scopes('parent')
            ->orderBy('position')
            ->get();

        return view('admin.navbar-elements.index', ['navbarElements' => $elements]);
    }

    /**
     * Update the resources order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateOrder(Request $request)
    {
        $this->validate($request, [
            'order.*.id' => ['required', 'integer'],
            'order.*.children' => ['sometimes', 'array'],
        ]);

        $elements = $request->input('order');

        $position = 1;

        foreach ($elements as $element) {
            $id = $element['id'];
            $children = $element['children'] ?? [];

            NavbarElement::whereKey($id)->update([
                'position' => $position++,
                'parent_id' => null,
            ]);

            $childPosition = 1;

            foreach ($children as $child) {
                NavbarElement::whereKey($child['id'])->update([
                    'position' => $childPosition++,
                    'parent_id' => $id,
                ]);
            }
        }

        NavbarElement::clearCache();

        return response()->json([
            'message' => trans('admin.navbar-elements.status.nav-updated'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navbar-elements.create', [
            'types' => NavbarElement::types(),
            'pages' => Page::enabled()->get(),
            'posts' => Post::published()->get(),
            'pluginRoutes' => plugins()->getRouteDescriptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\NavbarElementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavbarElementRequest $request)
    {
        $navbar = new NavbarElement();
        $data = $request->validated();
        save_translations($navbar, $data['translations']);

        $navbar->update(Arr::except($data, 'translations'));

        return redirect()->route('admin.navbar-elements.index')
            ->with('success', trans('admin.navbar-elements.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\NavbarElement  $navbarElement
     * @return \Illuminate\Http\Response
     */
    public function edit(NavbarElement $navbarElement)
    {
        return view('admin.navbar-elements.edit', [
            'navbarElement' => $navbarElement,
            'types' => NavbarElement::types(),
            'pages' => Page::enabled()->get(),
            'posts' => Post::published()->get(),
            'pluginRoutes' => plugins()->getRouteDescriptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\NavbarElementRequest  $request
     * @param  \Azuriom\Models\NavbarElement  $navbarElement
     * @return \Illuminate\Http\Response
     */
    public function update(NavbarElementRequest $request, NavbarElement $navbarElement)
    {
        if ($navbarElement->isDropdown() && $request->input('type') !== 'dropdown') {
            foreach ($navbarElement->elements as $element) {
                $element->parent()->dissociate();
                $element->save();
            }
        }
        $data = $request->validated();
        save_translations($navbarElement, $data['translations']);

        $navbarElement->update(Arr::except($data, 'translations'));

        return redirect()->route('admin.navbar-elements.index')
            ->with('success', trans('admin.navbar-elements.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\NavbarElement  $navbarElement
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(NavbarElement $navbarElement)
    {
        if ($navbarElement->isDropdown() && ! $navbarElement->elements->isEmpty()) {
            return redirect()->route('admin.navbar-elements.index')
                ->with('error', trans('admin.navbar-elements.status.not-empty'));
        }

        $navbarElement->delete();

        return redirect()->route('admin.navbar-elements.index')
            ->with('success', trans('admin.navbar-elements.status.deleted'));
    }
}
