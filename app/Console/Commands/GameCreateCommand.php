<?php

namespace Azuriom\Console\Commands;

use Azuriom\Support\EnvEditor;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class GameCreateCommand extends PluginCreateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:create
                        {name : The name of the game}
                        {id? : The id of the game}
                        {--author=Azuriom : The author of the game}
                        {--description=Plugin for Azuriom : The description of the game}
                        {--url=https://azuriom.com : The url of the game}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a custom game for Azuriom through a plugin.';

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $id = $this->argument('id') ?? Str::slug($name);
        $studlyName = Str::studly($name);
        $path = plugin_path($id);
        $namespace = 'Azuriom\Plugin\\'.$studlyName;

        $code = $this->call('plugin:create', [
            'name' => $name,
            'id' => $id,
            '--author' => $this->option('author'),
            '--description' => $this->option('description'),
            '--url' => $this->option('url'),
        ]);

        if ($code !== 0) {
            return $code;
        }

        $sourcePath = __DIR__.'/stubs/game';

        $this->copyFiles($sourcePath, $path, $id, $studlyName, $namespace);

        EnvEditor::updateEnv([
            'AZURIOM_GAME' => $id,
        ]);

        return 0;
    }
}
