<?php

namespace App\Notifications\mail;

use App\models\attachments_m;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class sendVerificationCode extends Notification implements ShouldQueue
{
    use Queueable;

    private $user = "";
    private $data = [];

    public function __construct($user, $data)
    {

        $this->user = $user;
        $this->data = $data;

    }

    public function via($notifiable)
    {
        return ["mail"];
    }

    public function routeNotificationForMail($notification)
    {
        return $this->user->email;
    }


    public function toMail($notifiable)
    {



        return (new MailMessage)
                    ->subject('Verification Code')
                    ->greeting("Welcome ".$this->user->full_name)
                    ->line('Your Verification code is below ')
                    ->line($this->data["verification_code"])
                    ->action($this->data["verification_code"],"");
    }

}
