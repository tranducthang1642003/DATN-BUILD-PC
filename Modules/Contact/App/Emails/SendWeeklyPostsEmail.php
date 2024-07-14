<?php

namespace Modules\Contact\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWeeklyPostsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->view('emails.contact')
                    ->subject('Subject of the Email') // Replace with your desired subject
                    ->with([
                        'details' => $this->details,
                    ]);
    }
}
