<?php

namespace Azuriom\Console\Commands;

use Azuriom\Models\Server;
use Azuriom\Models\Setting;
use Illuminate\Console\Command;

class GamePingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping the game servers to update their stats.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Setting::updateSettings('schedule.last', now()->toISOString());

        $servers = Server::pingable()->get();

        foreach ($servers as $server) {
            $data = $server->bridge()->getServerData();

            $server->updateData($data, now()->minute % 15 === 0);
        }

        $this->info($servers->count().' server(s) were successfully pinged.');

        return 0;
    }
}
