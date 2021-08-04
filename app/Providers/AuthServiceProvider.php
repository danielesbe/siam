<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        // Gate::define('isTU', function($user) {
        // $user =auth()->guard('siam')->user();
        // return true;
        //  });

        //  Gate::define('isGuru', function($user) {
        //      return $user->role == 'guru';
        //  });

        //  Gate::define('isMurid', function($user) {
        //      return $user->role == 'murid';
        //  });
    }
}
