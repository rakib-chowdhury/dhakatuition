<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class activationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $user;

    public function __construct($token,$firstName)
    {
        $this->token = $token;
        $this->user = $firstName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'support@dhakatuitions.com';
        $name = 'TutorOla';
        $subject = 'TutorOla | Email Activation';
        return $this->view('notification.activation')
            ->with([
                'token' => $this->token,
                'user' => $this->user,
            ])
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}