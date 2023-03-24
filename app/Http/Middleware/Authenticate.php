<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(Str::contains($request->url(), "/admin")){
            return $request->expectsJson() ? null : route('admin.login');
        }

        if(Str::contains($request->url(), "/blog")){
            return $request->expectsJson() ? null : route('blog.login');
        }
        return $request->expectsJson() ? null : route('login');
    }
}
