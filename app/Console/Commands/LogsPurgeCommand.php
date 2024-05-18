<?php

namespace Azuriom\Console\Commands;

use Azuriom\Models\ActionLog;
use Illuminate\Console\Command;

class LogsPurgeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge logs older than 6 months.';

    /**
     * Execute the console command.
     *
     * @throws \LogicException
     */
    public function handle()
    {
        $count = ActionLog::where('created_at', '<', now()->subMonths(6))->delete();

        $this->info($count.' logs was deleted.');
    }
}
