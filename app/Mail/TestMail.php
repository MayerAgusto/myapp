<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $escuela;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escuela)
    {
        //
        $this->escuela = $escuela;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva escuela cerca de tu localidad')->view('emails.TestMail');
    }
}
