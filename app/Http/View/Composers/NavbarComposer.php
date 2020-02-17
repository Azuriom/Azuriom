<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Models\NavbarElement;
use Illuminate\View\View;

class NavbarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $navbar = NavbarElement::with('elements')
            ->scopes('parent')
            ->orderBy('position')
            ->get()
            ->filter(function (NavbarElement $element) {
                return ! $element->isDropdown() || ! $element->elements->isEmpty();
            });

        $view->with('navbar', $navbar);
    }
}
