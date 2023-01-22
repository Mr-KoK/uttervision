<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $password;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $id, $password)
    {
        $this->name = $name;
        $this->id = $id;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.custome')->subject($this->subject);
    }
}