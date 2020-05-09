<?php

namespace Azuriom\Notifications;

use Azuriom\Models\User;
use Illuminate\Notifications\Notification;

class AlertNotificationChannel
{
    /**
     * Send the given notification.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send(User $user, Notification $notification)
    {
        $message = $notification->toAlert($user);

        $user->notifications()->create($message->toArray());
    }
}
