<?php

// app/Mail/RequestStatusMail.php
namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
 use Illuminate\Queue\SerializesModels;

class RequestStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->subject('Request Status Update')
                    ->view('emails.request_status')
                    ->with(['request' => $this->request]);
    }
}