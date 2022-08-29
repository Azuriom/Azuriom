<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;

class PluginDisableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:disable {id : The id of the plugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable an enabled plugin';

    /**
     * Execute the console command.
     */
    public function handle(PluginManager $plugins)
    {
        $id = $this->argument('id');

        if (! $plugins->disable($id)) {
            $this->error('Unable to disable plugin with id '.$id);

            return 1;
        }

        $this->info('Plugin "'.$id.'" disabled.');

        return 0;
    }
}
