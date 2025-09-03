<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AwardMail extends Mailable
{
    use Queueable, SerializesModels;
    public $awardee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($awardee)
    {
        $this->awardee = $awardee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You have received an award: ' . $this->awardee->award->name)
            ->view('emails.award');

            
    }
}
