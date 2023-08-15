<?php

namespace Azuriom\Extensions\Plugin;

use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\View\View;

abstract class AdminUserEditComposer
{
    /**
     * Get the cards to add to the user profile.
     * Each card should contain:
     * - 'name' : The title of the card
     * - 'view' : The view (Ex: shop::giftcards.index).
     *
     * @return array{name: string, view: string}[]
     */
    abstract public function getCards(User $user, View $view);

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $oldCards = Arr::get($view, 'cards', []);
        $cards = array_merge($this->getCards($view['user'], $view), $oldCards);

        $view->with('cards', $cards);
    }
}
