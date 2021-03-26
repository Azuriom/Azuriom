<?php

namespace Azuriom\Console\Commands;

use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create
                        {--admin : If the user is admin}
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
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'role_id' => Role::defaultRoleId(),
        ];

        $admin = $this->option('admin');

        $data['name'] = $this->option('name') ?? $this->ask('The username of the user');
        $data['email'] = $this->option('email') ?? $this->ask('The Email address of the user');
        $data['password'] = Hash::make($this->option('password') ?? $this->secret('The password of the user'));

        $user = User::create($data);
        $user->markEmailAsVerified();

        if ($admin) {
            $role = Role::admin()->orderByDesc('power')->value('id');

            if ($role) {
                $user->role()->associate($role)->save();
            }
        }

        $this->info('User created!');

        return 0;
    }
}
