<?php

namespace Azuriom\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('game:ping')->everyMinute();
        $schedule->command('attachments:purge')->daily();
        $schedule->command('logs:purge')->monthly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        // require base_path('routes/console.php');
    }
}
