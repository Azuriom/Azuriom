<?php

namespace Azuriom\Notifications;

use Illuminate\Notifications\Notification;

class AlertNotificationChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toAlert($notifiable);

        $notifiable->notifications()->create($message->toArray());
    }
}
