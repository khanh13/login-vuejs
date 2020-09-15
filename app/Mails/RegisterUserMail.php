<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;

    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;

        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('api/activate-email/' . $this->token);

        return $this->from('appscyclone@gmail.com')
            ->subject('Confirm your email address!')
            ->view('mail.register-user')
            ->with([
                'name' => $this->user->name,
                'token' => $this->token,
                'url' => $url,
            ]);
    }
}
