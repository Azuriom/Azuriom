<?php

namespace Azuriom\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class DatabaseConfigCommand extends Command
{
    use ConfirmableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:config
                        {--driver= : The database driver}
                        {--host= : The address of the database server}
                        {--port= : The port of the database server}
                        {--database= : The database name}
                        {--username= : The username of the user}
                        {--password= : The password of the user}
                        {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Config the database credentials.';

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
        $this->confirmToProceed();

        $drivers = [
            'mysql' => 'MySQL',
            'pgsql' => 'PostgreSQL',
        ];

        $driver = $this->option('driver') ?? $this->choice('The database driver', $drivers, 'mysql');

        if (! array_key_exists($driver, $drivers)) {
            $this->error('Invalid database driver: '.$driver);

            return 1;
        }

        $defaultPort = ($driver === 'pgsql') ? 5432 : 3306;

        $env = [
            'DB_CONNECTION' => $driver,
            'DB_HOST' => $this->option('host') ?? $this->ask('The address of the database server'),
            'DB_PORT' => $this->option('port') ?? $this->ask('The port of the database server', $defaultPort),
            'DB_DATABASE' => $this->option('database') ?? $this->ask('The database name'),
            'DB_USERNAME' => $this->option('username') ?? $this->ask('The username of the user'),
            'DB_PASSWORD' => $this->option('password') ?? $this->secret('The password of the user'),
        ];

        $this->updateEnv(base_path('.env'), $env);

        $this->info('Database config successfully updated.');

        return 0;
    }

    protected function updateEnv(string $file, array $values)
    {
        $contents = $this->files->get($file);

        foreach ($values as $key => $value) {
            if (Str::contains($value, ' ') || Str::contains($value, '#')) {
                if (Str::contains($value, '"')) {
                    $value = str_replace('"', '\"', $value);
                }
                $value = '"'.$value.'"';
            }

            preg_match("/^{$key}=[^\r\n]*/m", $contents, $matches);
            if (count($matches)) {
                $oldValue = substr($matches[0], strlen($key) + 1);

                $contents = str_replace("{$key}={$oldValue}", "{$key}={$value}", $contents);
            } else {
                $contents .= PHP_EOL."{$key}={$value}";
            }
        }

        return $this->files->put($file, $contents);
    }
}
