<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('permission', function ($permission) {
            $user = auth('user')->user();
            if ($user) {
                if ($user->role_id == null) {
                    return true;
                }
                $role = $user->role()->first();
                return $role->permissions()->wherePermission($permission)->count();
            }
            return false;
        });
    }
}
