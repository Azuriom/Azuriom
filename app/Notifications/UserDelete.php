<?php

namespace Azuriom\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class UserDelete extends Notification
{
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = URL::temporarySignedRoute('profile.delete.confirm', now()->addMinutes(30), [
            'id' => $notifiable->getKey(),
        ]);

        return (new MailMessage())
            ->subject(trans('mail.delete.subject'))
            ->line(trans('mail.delete.line1'))
            ->action(trans('mail.delete.action'), $url)
            ->line(trans('mail.delete.line2', ['count' => 30]))
            ->line(trans('mail.delete.line3'));
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
}
