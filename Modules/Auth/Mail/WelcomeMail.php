<?php

// Modules/Auth/Mail/WelcomeMail.php

namespace Modules\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $token;

    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('emails.welcome') // Adjust the view path as per your directory structure
                    ->with([
                        'email' => $this->email,
                        'token' => $this->token,
                    ]);
    }
}
