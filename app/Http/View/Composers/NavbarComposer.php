<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Models\NavbarElement;
use Azuriom\Models\Role;
use Illuminate\Database\Eloquent\Collection as ModelCollection;
use Illuminate\Support\Arr;
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
        $elements = $this->loadNavbarElements()->filter(function (NavbarElement $element) {
            return $element->hasPermission();
        });
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
        $elements = Cache::get('navbar', function () {
            return NavbarElement::orderBy('position')->with('roles')->get();
        });

        if ($elements instanceof ModelCollection) {
            // Not in cache yet
            $elementsToCache = $elements->toArray();
            for ($i = 0; $i < count($elements); $i++) {
                $elementsToCache[$i]['name'] = json_encode($elements[$i]->getTranslations('name'));
            }

            Cache::put('navbar', $elementsToCache, now()->addDay());

            return $elements;
        }

        return NavbarElement::hydrate($elements)->each(function (NavbarElement $element) {
            $element->setRelation('roles', Role::hydrate($element->roles));
            $element->setRawAttributes(Arr::except($element->getAttributes(), 'roles'), true);
        });
    }
}
