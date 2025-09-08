<?php

namespace App\Mail\Leave;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplayLeaveMail extends Mailable
{
    use Queueable, SerializesModels;
    public $leave;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($leave)
    {
        $this->leave=$leave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Leave Application Submitted')
                    ->view('emails.leave.leave_apply');
    }
}
