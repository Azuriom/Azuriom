<?php

namespace Azuriom\Listeners;

use Illuminate\Auth\Events\PasswordReset;

class UpdatePasswordChangedDate
{
    /**
     * Handle the event.
     */
    public function handle(PasswordReset $event): void
    {
        $event->user->update(['password_changed_at' => now()]);
    }
}
