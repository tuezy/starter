<?php

namespace App\Blog\Controllers;

use App\Auth\Controllers\AuthenticationController;

class AuthController extends AuthenticationController
{
    protected function guard(){
        return 'web';
    }

    protected function redirectAfterLogin(){
        return 'blog';
    }

    protected function redirectAfterLogout(){
        return '/';
    }

    public function showFormLogin(){
        return view("blog::pages.login");
    }
}