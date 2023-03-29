<?php

namespace App\Admin\Controllers\Auth;

class LoginController extends \App\Auth\Controllers\LoginController{
    protected function guard(){
        return 'admins';
    }
    protected function redirectAfterLogin(){
        return route("admin.dashboard");
    }

    public function showFormLogin(){
        return view("admin::pages.login");
    }
}