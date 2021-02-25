<?php

namespace App\Notifications\mail;

use App\models\attachments_m;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CancelSession extends Notification implements ShouldQueue
{
    use Queueable;

    private $user = "";
    private $time_from = "";
    private $session_date = "";
    private $data = [];

    public function __construct($user,$time_from,$session_date)
    {

        $this->user = $user;
        $this->time_from = $time_from;
        $this->session_date = $session_date;


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
            ->subject('Session Cancel')
            ->greeting("Welcome ".$this->user->username)
            ->line("your session at ".$this->time_from." ".$this->session_date." is Canceled");
    }

}
