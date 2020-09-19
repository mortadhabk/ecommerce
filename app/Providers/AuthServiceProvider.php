<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\User;
use App\Policies\ShopPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Shop' => 'App\Policies\ShopPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin',function (User $user) {
            return Auth::user()->hasRole('superadmin') ? true : false ;
        });
        Gate::define('isBusinessman',function (User $user) {
            return Auth::user()->hasRole('businessman') ? true : false ;
        });

        //
    }
}
