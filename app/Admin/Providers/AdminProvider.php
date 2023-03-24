<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->loadRoutesFrom(dirname(__DIR__) . "/Routes/admin_routes.php");
       $this->loadViewsFrom(dirname(__DIR__) . "/Views", "admin");
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
