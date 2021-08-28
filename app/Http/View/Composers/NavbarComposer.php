<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Models\NavbarElement;
use Illuminate\Database\Eloquent\Collection as ModelCollection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class NavbarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $elements = $this->loadNavbarElements();
        $parentElements = $elements->whereNull('parent_id');

        foreach ($parentElements as $element) {
            if (! $element->isDropdown()) {
                $element->setRelation('elements', collect());
                continue;
            }

            $element->setRelation('elements', $elements->where('parent_id', $element->id));
        }

        $view->with('navbar', $parentElements);
    }

    protected function loadNavbarElements()
    {
        $elements = Cache::get('navbar_elements', function () {
            return NavbarElement::orderBy('position')->with('roles')->get()->toArray();
        });

        if ($elements instanceof ModelCollection) {
            // Not in cache yet
            Cache::put('navbar_elements', $elements->toArray(), now()->addDay());
        }

        return NavbarElement::withRightPerm(NavbarElement::hydrate($elements));
    }
}
