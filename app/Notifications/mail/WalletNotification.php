<?php

namespace App\Notifications\mail;

use App\models\attachments_m;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WalletNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $user = "";
    private $time_from = "";
    private $session_date = "";
    private $username = "";
    private $last_price = "";
    private $data = [];

    public function __construct($user,$time_from,$session_date,$username,$last_price)
    {

        $this->user = $user;
        $this->time_from = $time_from;
        $this->session_date = $session_date;
        $this->username = $username;
        $this->last_price = $last_price;




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
            ->subject('Forsa Tanya Wallet')
            ->greeting("Welcome ".$this->user->username)
            ->line("You received ".$this->last_price." EG In your wallet for the session with ".$this->username." at ".$this->session_date." ".$this->time_from);
    }

}
