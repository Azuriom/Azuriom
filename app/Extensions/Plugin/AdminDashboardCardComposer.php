<?php

namespace Azuriom\Extensions\Plugin;

use Illuminate\Support\Arr;
use Illuminate\View\View;

abstract class AdminDashboardCardComposer
{
    /**
     * Get the cards to add to the admin dashboard.
     * Each card should contains:
     * - 'color' : A Bootstrap color (e.g: success)
     * - 'icon' : A FontAwesome 5 icon (e.g: fas fa-rocket)
     * - 'name' : The name of the card
     * - 'value' : The value of the card.
     *
     * @return array
     */
    abstract public function getCards();

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cards = Arr::get($view, 'cards', []);

        $view->with('cards', $this->getCards() + $cards);
    }
}
