<?php

namespace Azuriom\Extensions\Plugin;

abstract class UserProfileCardComposer extends AdminDashboardCardComposer
{
    /**
     * Get the cards to add to the user profile.
     * Each card should contains:
     * - 'name' : The name of the card
     * - 'view' : The view (Ex: shop::giftcards.index).
     *
     * @return array
     */
    abstract public function getCards();
}
