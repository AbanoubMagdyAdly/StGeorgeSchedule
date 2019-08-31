<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class deleteBook extends Mailable
{
    private $book;
    private $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book , $reason)
    {
        $this->book = $book;
        $this->reason = $reason;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('deleteBookingMail',['booking'=>$this->book,
                                                'reason' =>$this->reason]);
    }
}
