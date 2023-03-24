<?php

namespace App\Blog\Events;

use App\Blog\Mail\SendBlogLoginToken;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendTokenAfterLogin{



    public function handle(User $user): void
    {
        Mail::to($user)->send(new SendBlogLoginToken($user));
    }
}