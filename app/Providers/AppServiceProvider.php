<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public static function redirectToByRole($user)
{
    if ($user->hasRole('admin')) {
        return '/admin/index';
    }
    if ($user->hasRole('jefe')) {
        return '/jefeEgresados/index';
    }
    return '/egresados/index';
}

    
}
