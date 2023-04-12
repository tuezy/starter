<?php

namespace App\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

abstract class Authentication extends Controller{
    public abstract function guard();
    protected function authGuard(){
        return Auth::guard($this->guard());
    }

}