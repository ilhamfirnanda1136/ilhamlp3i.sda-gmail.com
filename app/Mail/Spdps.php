<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Spdps extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emaildata)
    {
         $this->emaildata=$emaildata;
         $this->subject=$emaildata['subject'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from(config('global.email'),'Siap Bersama')
        ->subject($this->subject)
        ->view('mail.notif')
        ->with($this->emaildata);
    }
}
