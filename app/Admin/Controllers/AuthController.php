<?php

namespace App\Admin\Controllers;

use App\Auth\Controllers\AuthenticationController;

class AuthController extends AuthenticationController
{
    protected function guard(){
        return 'admins';
    }

    protected function redirectAfterLogin(){
        return route("admin.dashboard");
    }

    protected function redirectAfterLogout(){
        return route("admin.login");
    }

    public function showFormLogin(){
        return view("admin::pages.login");
    }
}