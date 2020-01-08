<?php

namespace Azuriom\Console\Commands;

use Azuriom\Extensions\Plugin\PluginManager;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class PluginClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache the plugins service providers';

    /**
     * Execute the console command.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Azuriom\Extensions\Plugin\PluginManager  $extensions
     * @return mixed
     */
    public function handle(Filesystem $files, PluginManager $extensions)
    {
        if ($files->exists($extensions->getCachedPluginsPath())) {
            $files->delete($extensions->getCachedPluginsPath());
        }

        $this->info('Cached plugins files removed');
    }
}
