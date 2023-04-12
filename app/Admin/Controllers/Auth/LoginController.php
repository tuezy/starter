<?php

namespace App\Admin\Controllers\Auth;

class LoginController extends \App\Auth\Controllers\LoginController{
    public function guard(){
        return 'admins';
    }
    public function redirectAfterLogin(){
        return route("admin.dashboard");
    }

    public function showFormLogin(){
        return view("admin::pages.login");
    }
}