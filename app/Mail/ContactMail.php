<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $contactInfo;
    public function __construct($contactInfo)
    {
        $this->contactInfo = $contactInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = $this->contactInfo['email'];
        $name = $this->contactInfo['name'];
        $subject = 'TutorOla | contact';

        return $this->view('notification.contactMail')
            ->with(['info'=>$this->contactInfo])
            ->from($address, $name)            
            ->subject($subject);
    }
}
