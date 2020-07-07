<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;

class PluginCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache the plugins service providers';

    /**
     * Execute the console command.
     *
     * @param  \Azuriom\Extensions\Plugin\PluginManager  $plugins
     * @return int
     */
    public function handle(PluginManager $plugins)
    {
        $plugins->cachePlugins();

        $this->info('Cached plugins files generated successfully.');

        return 0;
    }
}
