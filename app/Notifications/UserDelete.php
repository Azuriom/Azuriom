<?php

namespace Azuriom\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class UserDelete extends Notification
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
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
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
}
