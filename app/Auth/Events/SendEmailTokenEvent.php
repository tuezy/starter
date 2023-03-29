<?php

namespace App\Auth\Events;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendEmailTokenEvent{
    public function handle(User $user): void
    {
        Mail::to($user)->send(new \App\Auth\Mail\SendTokenAfterLogin($user));
    }
}