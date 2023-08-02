<?php

namespace Azuriom\Console\Commands;

use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Console\Command;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create
                        {--admin : If the user should be admin}
                        {--name= : The name of the user}
                        {--password= : The password of the user}
                        {--email= : The email of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'role_id' => Role::defaultRoleId(),
            'name' => $this->option('name') ?? $this->ask('The username of the user'),
            'email' => $this->option('email') ?? $this->ask('The Email address of the user'),
            'password' => $this->option('password') ?? $this->secret('The password of the user'),
        ]);

        if ($this->option('admin')) {
            $role = Role::admin()->orderByDesc('power')->value('id');

            if ($role) {
                $user->role()->associate($role);
            }
        }

        $user->markEmailAsVerified();

        $this->info('User created successfully.');
    }
}
