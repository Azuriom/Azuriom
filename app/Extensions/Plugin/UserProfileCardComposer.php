<?php

namespace Azuriom\Extensions\Plugin;

abstract class UserProfileCardComposer extends AdminDashboardCardComposer
{
    /**
     * Get the cards to add to the user profile.
     * Each card should contain:
     * - 'name' : The title of the card
     * - 'view' : The view (Ex: shop::giftcards.index).
     * - 'data' : The data array for view (Ex: compact('user'))
     *
     * @return array{name: string, view: string, data: mixed}[]
     */
    abstract public function getCards();
}
