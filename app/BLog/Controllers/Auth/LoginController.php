<?php

namespace App\Blog\Controllers\Auth;

use App\Auth\Controllers\LoginController as Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class LoginController extends Login
{
    public function guard(){
        return 'web';
    }

    public function redirectAfterLogin(){
        $user = $this->authGuard()->user();
        $user->token_login = time();
        $user->save();
        Event::dispatch("auth.blog-login.after", $user);
        return '/blog';
    }

    public function showFormLogin(){
        return view("blog::pages.login");
    }

    public function showConfirmLoginTokenForm(){
        return view("blog::pages.login-token");
    }

    public function confirmLoginToken(Request $request){
        $user = $this->authGuard()->user();
        if($user->token_login == $request->get("token")){
            $user->token_login = NULL;
            $user->save();
            return back();
        }
        return back()->withErrors([
            'token' => 'The provided credentials do not match our records.',
        ])->onlyInput('token');
    }
}