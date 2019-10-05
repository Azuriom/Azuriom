<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\NavbarElementRequest;
use Azuriom\Models\ActionLog;
use Azuriom\Models\NavbarElement;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Illuminate\Http\Request;

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

        return view('admin.navbar-elements.index')->with('navbarElements', $elements);
    }

    /**
     * Update the resources order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateOrder(Request $request)
    {
        $this->validate($request, [
            'order.*.id' => ['required', 'integer'],
            'order.*.children' => ['sometimes', 'array']
        ]);

        $elements = $request->input('order');

        $position = 1;

        foreach ($elements as $element) {
            $id = $element['id'];
            $children = $element['children'] ?? [];

            NavbarElement::whereKey($id)->update(['position' => $position++, 'parent_id' => null]);

            $childPosition = 1;

            foreach ($children as $child) {
                NavbarElement::whereKey($child['id'])->update(['position' => $childPosition++, 'parent_id' => $id]);
            }
        }

        ActionLog::logUpdate('Navbar');

        return $request->ajax() ? response()->json([
            'status' => 'success',
            'message' => 'Navbar updated'
        ]) : $this->index();
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
            'posts' => Post::published()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\NavbarElementRequest  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(NavbarElementRequest $request)
    {
        request_checkbox($request, 'new_tab');

        $request->offsetSet('value', $this->getLinkValue($request));

        NavbarElement::create($request->all());

        return redirect()->route('admin.navbar-elements.index')->with('success', 'Element created');
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
            'posts' => Post::published()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\NavbarElementRequest  $request
     * @param  \Azuriom\Models\NavbarElement  $navbarElement
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(NavbarElementRequest $request, NavbarElement $navbarElement)
    {
        request_checkbox($request, 'new_tab');

        $request->offsetSet('value', $this->getLinkValue($request));

        if ($navbarElement->isDropDown() && $request->input('type') !== 'dropdown') {
            foreach ($navbarElement->elements as $element) {
                $element->parent()->dissociate();
                $element->save();
            }
        }

        $navbarElement->update($request->all());

        return redirect()->route('admin.navbar-elements.index')->with('success', 'Element updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\NavbarElement  $navbarElement
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(NavbarElement $navbarElement)
    {
        if ($navbarElement->isDropDown() && $navbarElement->elements->count() > 0) {
            return redirect()->route('admin.navbar-elements.index')
                ->with('error', 'You cannot delete dropdown with elements');
        }

        $navbarElement->delete();

        return redirect()->route('admin.navbar-elements.index')->with('success', 'Element deleted');
    }

    /**
     * Get the link value to store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getLinkValue(Request $request)
    {
        switch ($request->input('type')) {
            case 'page':
                $page = Page::find($request->input('page'));
                return $page ? $page->slug : '';
            case 'post':
                $post = Post::find($request->input('post'));
                return $post ? $post->slug : '';
            case 'link':
                $this->validate($request, ['link' => 'required|string|max:100']);
                return $request->input('link');
            default:
                return '#';
        }
    }
}
