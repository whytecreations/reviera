<?php

namespace App\Providers;

use App\Role;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        Gate::define('corporate_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('corporate_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('corporate_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('corporate_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('corporate_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        Gate::define('flower_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_category_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        Gate::define('flower_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('flower_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        Gate::define('chocolate_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_category_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        Gate::define('chocolate_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('chocolate_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        Gate::define('gift_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gift_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gift_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gift_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('gift_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


    }
}
