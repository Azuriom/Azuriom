<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;
use RuntimeException;

class PluginDownloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:download
                            {id : Plugin\'s id we wish to download.}
                            {version=latest : Plugin\'s version.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download a plugin';

    /**
     * Execute the console command.
     */
    public function handle(PluginManager $plugins)
    {
        $extensionId = $this->argument('id');

        $plugin = $plugins->getOnlinePlugins()
            ->first(fn ($plugin) =>  $plugin['extension_id'] == $extensionId);

        if ($plugin === null) {
            throw new RuntimeException("There is no plugin with extension_id '$extensionId',' ".
            'or it is already downloaded or does not support this installation.');
        }

        $id = $plugin['id'];
        $plugins->install($id, $this->argument('version'));
        $this->info("Plugin $extensionId downloaded.");

        return 0;
    }
}
