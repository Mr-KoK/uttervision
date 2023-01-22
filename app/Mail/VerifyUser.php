<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Exception;

class VerifyUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $id;
    public $code;
    public $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$id,$code,$link)
    {
        $this->email = $email;
        $this->name = $name;
        $this->id = $id;
        $this->code = $code;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        try {
            return $this->view('emails.verify')->subject('Verify Your Account');
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }
}
