<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    public $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$link)
    {
        $this->id = $id;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.password')->subject('Reset Password Account!');
    }
}