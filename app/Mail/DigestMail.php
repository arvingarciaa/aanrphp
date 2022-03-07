<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class DigestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $user = User::find(1);
        $this->name = $user->first_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.digest')
            ->subject('KM4AANR Weekly Digest');
    }
}
