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
    protected $signature = 'plugin:enable {id : Plugin\'s id we wish to enable.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable a plugin';

    /**
     * Execute the console command.
     */
    public function handle(PluginManager $plugins)
    {
        $id = $this->argument('id');
        $plugins->enable($id);
        $this->info("Plugin $id enabled.");

        return 0;
    }
}
