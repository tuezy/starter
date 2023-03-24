<?php

namespace App\Providers;

use App\Admin\Providers\AdminProvider;
use App\Blog\Providers\BlogProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(AdminProvider::class);
        $this->app->register(BlogProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}