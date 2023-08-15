<?php

namespace Azuriom\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * Get the reset password notification mail message for the given URL.
     *
     * @param  string  $url
     */
    protected function buildMailMessage($url): MailMessage
    {
        $expire = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

        return (new MailMessage())
            ->subject(trans('auth.mail.reset.subject'))
            ->line(trans('auth.mail.reset.line1'))
            ->action(trans('auth.mail.reset.action'), $url)
            ->line(trans('auth.mail.reset.line2', ['count' => $expire]))
            ->line(trans('auth.mail.reset.line3'));
    }
}
