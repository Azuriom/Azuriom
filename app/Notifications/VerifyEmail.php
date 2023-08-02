<?php

namespace Azuriom\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     */
    protected function buildMailMessage($url): MailMessage
    {
        return (new MailMessage())
            ->subject(trans('auth.mail.verify.subject'))
            ->line(trans('auth.mail.verify.line1', [
                'count' => config('auth.verification.expire', 60),
            ]))
            ->action(trans('auth.mail.verify.action'), $url)
            ->line(trans('auth.mail.verify.line2'));
    }
}
