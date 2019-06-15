<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class CorporateEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The request instance.
     *
     * @var Request
     */
    public $request;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public static function getDestinationEmail()
    {
        return  env('CONTACT_ENQUIRY_EMAIL', 'razi@whytecreations.in');
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.email.corporate-enquiry');
    }
}
