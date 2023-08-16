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
        // 'App\Model\User' => 'App\Policies\DivisiPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
         });

         Gate::define('isTeknisi', function($user) {
            return $user->role == 'teknisi';
         });

         Gate::define('isUser', function($user) {
            return $user->role == 'user';
         });
        
         /* define a manager user role */
         Gate::define('isTeknisiNadmin', function($user) {
            return in_array($user->role, ['teknisi', 'admin']);
         });
       
         /* define a user role */
         Gate::define('isUserNadmin', function($user) {
            return in_array($user->role, ['user', 'admin']);
         });
    }
}
