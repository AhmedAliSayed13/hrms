<?php

namespace App\Mail\Leave;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeaveApprovalMail extends Mailable
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
        return $this->subject('Leave Approval Request')
                    ->view('emails.leave.leave_approval')
                    ->with([
                        'leave' => $this->leave
                    ]);
    }
}
