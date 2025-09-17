<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build(){
        return $this->from('contact@domain.com','contact') 
                    ->subject('New Contact From ContactUS')
                    ->view('web.setting.contactMail');
    }
    
}
