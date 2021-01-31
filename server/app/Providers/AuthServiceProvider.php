<?php

namespace App\Providers;

use App\Models\RoleConstants;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin',function ($user) {
            return $user->role->id == RoleConstants::ROLE_ADMIN;
        });

        Gate::define('admin-staff',function ($user) {
           return $user->role->id == RoleConstants::ROLE_ADMIN ||
               $user->role->id == RoleConstants::ROLE_STAFF;
        });
    }
}
