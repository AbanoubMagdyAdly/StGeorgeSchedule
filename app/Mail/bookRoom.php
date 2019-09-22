<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bookRoom extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user , $meeting_name , $day , $from , $to )
    {
        $this->user = $user;
        $this->meeting_name = $meeting_name;
        $this->day = $day;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Approve Request')
                ->view('mail' ,['user'=>$this->user,
                                'meeting_name' =>$this->meeting_name,
                                'day' => $this->day,
                                'from' => $this->from,
                                'to'=> $this->to]);
    }
}
