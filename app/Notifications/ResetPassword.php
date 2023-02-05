<?php

namespace Azuriom\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback !== null) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        $url = $this->verificationUrl($notifiable);

        $expire = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

        return (new MailMessage())
            ->subject(trans('auth.mail.reset.subject'))
            ->line(trans('auth.mail.reset.line1'))
            ->action(trans('auth.mail.reset.action'), $url)
            ->line(trans('auth.mail.reset.line2', ['count' => $expire]))
            ->line(trans('auth.mail.reset.line3'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(config('app.url').route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
