<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;

class PluginDownloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:download
                            {id : The id of the plugin}
                            {version? : The version of the plugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download a plugin from market.azuriom.com';

    /**
     * Execute the console command.
     */
    public function handle(PluginManager $plugins)
    {
        $extensionId = $this->argument('id');

        $plugin = $plugins->getOnlinePlugins()
            ->first(fn ($plugin) => $plugin['extension_id'] === $extensionId);

        if ($plugin === null) {
            $this->error('There is no plugin with id "'.$extensionId
                .'", it is already downloaded or does not support this installation.');

            return 1;
        }

        $plugins->install($plugin['id'], $this->argument('version'));
        $this->info('Plugin '.$extensionId.' downloaded.');

        return 0;
    }
}
