<?php

namespace App\Admin\Controllers\Auth;

class LogoutController extends \App\Auth\Controllers\LogoutController{
    public function guard(){
        return 'admins';
    }

    public function redirectAfterLogout(){
        return route("admin.login");
    }
}