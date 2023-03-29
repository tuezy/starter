<?php

namespace App\Blog\Controllers\Auth;

use App\Auth\Controllers\LogoutController as Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class LogoutController extends Logout
{
    protected function guard(){
        return 'web';
    }

    protected function redirectAfterLogout(){
        return '/blog';
    }

}