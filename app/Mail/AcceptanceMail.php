<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Proposal;

class AcceptancenMail extends Mailable
{
    use Queueable, SerializesModels;
    public $proposal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal)
    {
        $this->proposal=$proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.AcceptanceEmail');
    }
}
