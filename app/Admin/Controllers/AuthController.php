<?php

namespace App\Admin\Controllers;

use App\Auth\Controllers\AuthenticationController;

class AuthController extends AuthenticationController
{
    protected function guard(){
        return 'admins';
    }

    protected function redirectAfterLogin(){
        return 'admin';
    }

    protected function redirectAfterLogout(){
        return '/';
    }

    public function showFormLogin(){
        return view("admin::pages.login");
    }
}