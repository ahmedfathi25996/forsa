<?php

namespace App\Notifications\mail;

use App\models\attachments_m;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class resetPassword extends Notification implements ShouldQueue
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
        $user_code  = $this->data["user_code"];
        $full_url   = url("/change/password?user_code=$user_code");

        return (new MailMessage)
                    ->subject('Reset your password')
                    ->greeting("Welcome ".$this->user->full_name)
                    ->line('We have received request to forget your password if is not from you please forget this message! ')
                    ->action("Reset your password",$full_url);
    }

}
