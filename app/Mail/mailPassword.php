<?php

// app/Mail/StudentPasswordMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class mailPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $password;

    public function __construct(User $student, $password)
    {
        $this->student = $student;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject("Voici votre mot de passe temporaire que vous devrez changer")
            ->view('email.password')
            ->with([
                'student' => $this->student,
                'password' => $this->password,
            ]);
    }

}
