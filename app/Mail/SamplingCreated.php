<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SamplingCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $sampling;

    /**
     * Create a new message instance.
     */
    public function __construct($sampling)
    {
        $this->sampling = $sampling;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Sampling Created')
                    ->view('emails.sampling_created')
                    ->with([
                        'sampling' => $this->sampling,
                    ]);
    }
}
