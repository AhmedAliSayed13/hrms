<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProbationEndNotify extends Mailable
{
    use Queueable, SerializesModels;
 public $employee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employee)
    {
         $this->employee = $employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))->subject('Probation Period Ended')
                    ->view('emails.probation_end_notify');
    }
}
