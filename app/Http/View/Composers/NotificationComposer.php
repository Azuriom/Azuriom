<?php

namespace Azuriom\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $notifications = Auth::user()?->unreadNotifications;

        $view->with('notifications', $notifications);
    }
}
