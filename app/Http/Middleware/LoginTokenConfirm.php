<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginTokenConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? ['web'] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                if(empty($user->token_login)){
                    return $next($request);
                }

                if($guard == 'admins'){
                    return redirect('/admin');
                }

                if($guard == 'customers'){
                    return redirect('/admin');
                }

                if($guard == 'web'){
                    return redirect(route("blog.login-token"));
                }
            }
        }

        return $next($request);
    }
}
