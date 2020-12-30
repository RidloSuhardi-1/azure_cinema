<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('login-customer', function($user){
            return $user->roles == "Customer";
           });

        Gate::define('login-employee', function($user){
            return $user->roles == "Member";
           });

        Gate::define('login-employee', function($user){
            return $user->roles == "Administrator";
           });
    }
}
