<?php

namespace Azuriom\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class PluginCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:create
                        {name : The name of the plugin}
                        {path? : The path of the plugin}
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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $slug = $this->argument('path') ?? strtolower($name);
        $path = plugin_path($slug);
        $namespace = 'Azuriom\Plugin\\'.$name;

        if ($this->files->exists($path)) {
            $this->error('The plugin '.$path.' already exists!');
            return false;
        }

        $this->files->makeDirectory($path);

        $this->createPluginJson($path, $name, $namespace);

        $this->createComposerJson($path, $name);

        $sourcePath = __DIR__.'/stubs/plugin';

        foreach ($this->files->allFiles($sourcePath, true) as $file) {
            $fileContent = $this->replace($file->getContents(), $name, $slug, $namespace);
            $filePath = $this->replace($file->getRelativePathname(), $name, $slug, $namespace);
            $filePath = $path.'/'.str_replace('.stub', '.php', $filePath);

            $dir = dirname($filePath);

            if (! $this->files->isDirectory($dir)) {
                $this->files->makeDirectory($dir, 0755, true);
            }

            $this->files->put($filePath, $fileContent);
        }

        $this->info('Plugin created successfully.');
    }

    private function createPluginJson(string $path, string $name, string $namespace)
    {
        $this->files->put($path.'/plugin.json', json_encode([
            'name' => $name,
            'description' => $this->option('description'),
            'version' => '1.0.0',
            'url' => $this->option('url'),
            'authors' => [
                $this->option('author')
            ],
            'providers' => [
                "\\{$namespace}\\Providers\\{$name}ServiceProvider",
                "\\{$namespace}\\Providers\\RouteServiceProvider",
            ]
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function createComposerJson(string $path, string $name)
    {
        $this->files->put($path.'/composer.json', json_encode([
            'name' => 'azuriom/'.strtolower($name),
            'type' => 'azuriom-plugin',
            'description' => $this->option('description'),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function replace(string $stub, string $name, string $path, string $namespace)
    {
        return str_replace(['DummyPlugin', 'DummyNamespace', 'DummySlug'], [$name, $namespace, $path], $stub);
    }
}
