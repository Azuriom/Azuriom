<?php

namespace Azuriom\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class PluginCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:create
                        {name : The name of the plugin}
                        {id? : The id of the plugin}
                        {--author=Azuriom : The author of the plugin}
                        {--description=Plugin for Azuriom : The description of the plugin}
                        {--url=https://azuriom.com : The url of the plugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Azuriom plugin';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

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

        if ($this->files->exists($path)) {
            $this->error("The plugin '{$path}' already exists!");

            return 1;
        }

        $this->files->makeDirectory($path);

        $this->createPluginJson($path, $id, $name, $studlyName, $namespace);

        $this->createComposerJson($path, $id, $namespace);

        $sourcePath = __DIR__.'/stubs/plugin';

        $this->copyFiles($sourcePath, $path, $id, $studlyName, $namespace);

        $this->info('Plugin created successfully.');

        return 0;
    }

    protected function copyFiles(string $source, string $path, string $id, string $studlyName, string $namespace)
    {
        foreach ($this->files->allFiles($source, true) as $file) {
            $fileContent = $this->replace($file->getContents(), $studlyName, $id, $namespace);
            $filePath = $this->replace($file->getRelativePathname(), $studlyName, $id, $namespace);
            $filePath = $path.'/'.str_replace('.stub', '.php', $filePath);

            $dir = dirname($filePath);

            if (! $this->files->isDirectory($dir)) {
                $this->files->makeDirectory($dir, 0755, true);
            }

            $this->files->put($filePath, $fileContent);
        }
    }

    private function createPluginJson(string $path, string $id, string $name, string $className, string $namespace)
    {
        $this->files->put($path.'/plugin.json', json_encode([
            'id' => $id,
            'name' => $name,
            'description' => $this->option('description'),
            'version' => '1.0.0',
            'url' => $this->option('url'),
            'authors' => [
                $this->option('author'),
            ],
            'azuriom_api' => '1.0.0',
            'providers' => [
                "\\{$namespace}\\Providers\\{$className}ServiceProvider",
                "\\{$namespace}\\Providers\\RouteServiceProvider",
            ],
        ], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function createComposerJson(string $path, string $id, string $namespace)
    {
        $this->files->put($path.'/composer.json', json_encode([
            'name' => 'azuriom/'.$id,
            'type' => 'azuriom-plugin',
            'description' => $this->option('description'),
            'autoload' => [
                'psr-4' => [
                    "{$namespace}\\" => 'src/',
                ],
            ],
            'replace' => [
                'guzzlehttp/guzzle' => '*',
                'guzzlehttp/promises' => '*',
                'guzzlehttp/psr7' => '*',
                'monolog/monolog' => '*',
                'nesbot/carbon' => '*',
                'psr/container' => '*',
                'psr/event-dispatcher' => '*',
                'psr/http-client' => '*',
                'psr/http-factory' => '*',
                'psr/http-message' => '*',
                'psr/log' => '*',
                'psr/simple-cache' => '*',
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function replace(string $stub, string $name, string $id, string $namespace)
    {
        return str_replace(['DummyPlugin', 'DummyNamespace', 'DummyId'], [$name, $namespace, $id], $stub);
    }
}
