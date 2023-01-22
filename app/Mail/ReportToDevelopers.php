<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportToDevelopers extends Mailable
{
    use Queueable, SerializesModels;

    public $line;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg,$line)
    {
        $this->msg = $msg;
        $this->line = $line ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.report')->from('Dev@uttervision.com', '@UtterDeveloperError');
    }
}
