<?php

namespace Azuriom\Console\Commands;

use Azuriom\Support\EnvEditor;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class GameCreateCommand extends Command
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
        parent::__construct();

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

        foreach ($this->files->allFiles($sourcePath, true) as $file) {
            $fileContent = $this->replace($file->getContents(), $studlyName, $id, $namespace);
            $filePath = $this->replace($file->getRelativePathname(), $studlyName, $id, $namespace);
            $filePath = $path.'/'.str_replace('.stub', '.php', $filePath);

            $dir = dirname($filePath);

            if (! $this->files->isDirectory($dir)) {
                $this->files->makeDirectory($dir, 0755, true);
            }
            
            $this->files->put($filePath, $fileContent);
        }

        EnvEditor::updateEnv([
            'AZURIOM_GAME' => $id,
        ]);

        $this->info('Game created successfully.');

        return 0;
    }

    private function replace(string $stub, string $name, string $id, string $namespace)
    {
        return str_replace(['DummyPlugin', 'DummyNamespace', 'DummyId'], [$name, $namespace, $id], $stub);
    }
}
