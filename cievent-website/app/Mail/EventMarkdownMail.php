<?php

namespace App\Mail;

use App\Models\Registed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventMarkdownMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datas = [];
    public $url = "{{route('events.index')}}";
    // public $url = "{{route('post')}}";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
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
        return $this->from('contact@cievent.ci')
                    ->subject('Inscription CI Evenement')
                    ->view('email.mail_event_registed');
    }
}
