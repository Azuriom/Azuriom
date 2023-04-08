<?php

namespace Azuriom\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback !== null) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage())
            ->subject(trans('auth.mail.verify.subject'))
            ->line(trans('auth.mail.verify.line1', [
                'count' => config('auth.verification.expire', 60),
            ]))
            ->action(trans('auth.mail.verify.action'), $verificationUrl)
            ->line(trans('auth.mail.verify.line2'));
    }
}
