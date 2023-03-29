<?php

namespace App\Admin\Controllers\Auth;

class LogoutController extends \App\Auth\Controllers\LogoutController{
    protected function guard(){
        return 'admins';
    }

    protected function redirectAfterLogout(){
        return route("admin.login");
    }
}