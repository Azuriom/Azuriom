<?php

namespace Azuriom\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $notifications = Auth::check() ? Auth::user()->unreadNotifications : null;

        $view->with('notifications', $notifications);
    }
}
