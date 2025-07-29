<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function build(): ContactMessage
    {
        return $this->subject('New Contact Message')
            ->view('emails.contact');
    }
}
