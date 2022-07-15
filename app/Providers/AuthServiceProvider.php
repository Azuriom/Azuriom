<?php

namespace Azuriom\Providers;

use Azuriom\Models\Comment;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Azuriom\Policies\CommentPolicy;
use Azuriom\Policies\PagePolicy;
use Azuriom\Policies\PostPolicy;
use Azuriom\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Page::class => PagePolicy::class,
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        Role::class => RolePolicy::class,
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
                return $user->role->hasRawPermission($ability);
            }
        });

        Password::defaults(fn () => Password::min(8)->mixedCase()->numbers());
    }
}
