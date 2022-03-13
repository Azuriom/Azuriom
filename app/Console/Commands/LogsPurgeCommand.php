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
     * @return int
     *
     * @throws \Exception
     */
    public function handle()
    {
        $query = ActionLog::where('created_at', '<', now()->subMonths(6));

        $count = $query->count();
        $query->delete();

        $this->info($count.' logs was deleted.');

        return 0;
    }
}
