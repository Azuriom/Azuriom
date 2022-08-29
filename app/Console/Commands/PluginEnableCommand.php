<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;

class PluginEnableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:enable {id : The id of the plugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable an installed plugin';

    /**
     * Execute the console command.
     */
    public function handle(PluginManager $plugins)
    {
        $id = $this->argument('id');

        if (! $plugins->enable($id)) {
            $this->error('Unable to enable plugin with id '.$id);

            return 1;
        }

        $this->info('Plugin "'.$id.'" enabled.');

        return 0;
    }
}
