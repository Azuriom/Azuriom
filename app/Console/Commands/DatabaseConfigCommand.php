<?php

namespace Azuriom\Console\Commands;

use Azuriom\Support\EnvEditor;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;

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
     * Execute the console command.
     */
    public function handle(): int
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

        EnvEditor::updateEnv($env);

        $this->info('Database config successfully updated.');

        return 0;
    }
}
