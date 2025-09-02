<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Promotion;

class PromotionCongratulationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $promotion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Congratulations on Your Promotion!')
                    ->markdown('emails.promotion.congratulation');
    }
}
