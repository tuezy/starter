<?php

namespace App\Auth\Providers;

use App\Auth\Events\SendEmailTokenEvent;
use App\Blog\Events\SendTokenAfterLogin;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen("auth.send-login-verify-token", [SendEmailTokenEvent::class, 'handle']);
    }
}
