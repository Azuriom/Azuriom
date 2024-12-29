<?php

namespace Azuriom\Extensions\Plugin;

abstract class UserProfileCardComposer extends AdminDashboardCardComposer
{
    /**
     * Get the cards to add to the user profile.
     * Each card should contain:
     * - 'name' : The title of the card
     * - 'view' : The view (Ex: shop::giftcards.index)
     * - 'data' : (Optional) The data array for the view (Ex: ['info' => $info]).
     *
     * @return array{name: string, view: string, data?: array}[]
     */
    abstract public function getCards();
}
