<?php

namespace Azuriom\Listeners;

use Illuminate\Auth\Events\PasswordReset;

class UpdatePasswordChangedDate
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $event->user->update(['password_changed_at' => now()]);
    }
}
