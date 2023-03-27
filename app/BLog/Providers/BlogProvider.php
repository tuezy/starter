<?php

namespace App\Blog\Providers;

use App\Blog\Events\SendTokenAfterLogin;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class BlogProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->loadRoutesFrom(dirname(__DIR__) . "/Routes/admin_routes.php");
       $this->loadViewsFrom(dirname(__DIR__) . "/Views", "blog");
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen("auth.blog-login.after", [SendTokenAfterLogin::class, 'handle']);
    }
}
