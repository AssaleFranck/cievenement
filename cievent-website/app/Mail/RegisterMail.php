<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datas = [];
    public $url = "http://127.0.0.1:8000/login";
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $info)
    {
        $this->datas = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

     
    public function build()
    {
        return $this->from('admin@cievent.ci')
                    ->subject('Nouveau compte')
                    ->view('email.mail_user_registed');
    }
}
