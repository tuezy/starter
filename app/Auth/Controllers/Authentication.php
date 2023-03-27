<?php

namespace App\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller{
    protected function guard(){
        return 'web';
    }

    protected function authGuard(){
        return Auth::guard($this->guard());
    }

    protected function redirectAfterLogin(){
        return 'dashboard';
    }

    protected function redirectAfterLogout(){
        return '/';
    }
}