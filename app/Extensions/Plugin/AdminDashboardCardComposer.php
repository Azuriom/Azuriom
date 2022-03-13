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
     * - 'icon' : A Bootstrap icon (e.g: bi bi-chat)
     * - 'name' : The name of the card
     * - 'value' : The value of the card.
     *
     * @return array{color: string, icon: string, name: string, value: string}
     */
    abstract public function getCards();

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cards = Arr::get($view, 'cards', []);

        $view->with('cards', array_merge($this->getCards(), $cards));
    }
}
