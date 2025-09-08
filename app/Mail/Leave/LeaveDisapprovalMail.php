<?php

namespace App\Mail\leave;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeaveDisapprovalMail extends Mailable
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
        return $this->subject('Leave Disapproval Request')
                    ->view('emails.leave.leave_disapproval')
                    ->with([
                        'leave' => $this->leave
                    ]);
    }
}
