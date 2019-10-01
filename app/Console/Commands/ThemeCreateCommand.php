<?php

namespace Azuriom\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ThemeCreateCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:create
                        {name : The name of the theme}
                        {path? : The path of the theme}
                        {--no-config : Disable config creation}
                        {--author=Azuriom : The author of the theme}
                        {--description=Theme for Azuriom : The version of the theme}
                        {--url=https://azuriom.com : The url of the theme}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme folder';

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
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
        $path = theme_path($this->argument('path') ?? strtolower($name));

        if ($this->files->exists($path)) {
            $this->error('The theme '.$path.' already exists!');
            return false;
        }

        $this->files->makeDirectory($path);

        $this->createThemeJson($path);

        if (! $this->hasArgument('no-config')) {
            $this->createConfigJson($path);
        }

        $this->createAssetsFolder($path);

        $this->info('Theme created successfully.');
    }

    private function createThemeJson(string $path)
    {
        $this->files->put($path.'/theme.json', json_encode([
            'name' => $this->argument('name'),
            'description' => $this->option('description'),
            'version' => '1.0.0',
            'url' => $this->option('url'),
            'authors' => [
                $this->option('author')
            ]
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function createConfigJson(string $path)
    {
        $this->files->put($path.'/config.json', '{}');
    }

    private function createAssetsFolder(string $path)
    {
        $this->files->makeDirectory($path.'/assets');
    }
}
