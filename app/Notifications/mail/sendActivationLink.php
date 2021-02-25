<?php

namespace App\Notifications\mail;

use App\models\attachments_m;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class sendActivationLink extends Notification implements ShouldQueue
{
    use Queueable;

    private $user = "";
    private $data = [];

    public function __construct($user)
    {

        $this->user = $user;

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
        $user_id = $this->user->user_id;
        $full_url   = url("/api/activation/$user_id");

        return (new MailMessage)
            ->subject('Activate Your Account')
            ->greeting("Welcome ".$this->user->username)
            ->action("Activate Your Account",$full_url);

    }

}
