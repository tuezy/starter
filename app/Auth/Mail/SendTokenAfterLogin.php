<?php

namespace App\Auth\Mail;

use App\Email\Emailable;
use Illuminate\Mail\Mailables\Content;

class SendTokenAfterLogin extends Emailable{

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }



    public function emailSubject()
    {
        return "Send Verify Token Login";
    }

    public function emailContent(): Content
    {
        return new Content(
            view: "blog::emails.send-blog-login-token",
            with: [
                'user' => $this->user,
                'totken' => $this->user->token_login
            ]
        );
    }

}