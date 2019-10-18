<?php

namespace Azuriom\Providers;

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Azuriom\Policies\CommentPolicy;
use Azuriom\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user, string $ability, array $arguments) {
            if ($user->isAdmin()) {
                return true;
            }

            if (empty($arguments)) {
                $user->role->loadMissing('permissions');

                $permission = $user->role->permissions->where('name', $ability)->first();

                if ($permission !== null) {
                    return $user->hasPermission($permission);
                }
            }
        });
    }
}
