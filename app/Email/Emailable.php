<?php
namespace App\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

abstract class Emailable extends Mailable{

    use Queueable, SerializesModels;
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            replyTo: [
                new Address('taylor@example.com', 'Taylor Otwell'),
            ],
            subject: $this->emailSubject(),
        );
    }

    public function content(): Content
    {
        return $this->emailContent();
    }

    public abstract function emailContent() : Content;
    public abstract function emailSubject();
}