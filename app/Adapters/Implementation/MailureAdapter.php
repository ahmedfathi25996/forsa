<?php

namespace App\Adapters\Implementation;

use App\Adapters\IMailure;
use Illuminate\Support\Facades\Mail;

class MailureAdapter implements IMailure
{

    public function sendEmail(
        array $emails = array() ,
        $data = "" ,
        $subject = "",
        $sender = "" ,
        $path_to_file = "",
        $name="",
        $reply_to="",
        $reply_to_name=""
    )
    {

        if(empty($sender)){
            $sender = env('SENDER_EMAIL','example@example.com');
        }


        if (is_array($emails) && count($emails) > 0)
        {

            if (is_array($data) && count($data) > 0)
            {
                $view = "email.advanced";
            }
            else{
                $data = ["default" => $data];
                $view = "email.default";
            }

            Mail::send($view,$data,function ($message) use (
                $emails , $subject, $sender, $path_to_file,$name,$reply_to,$reply_to_name
            ) {

                // changed once for every site
                if($name!=""){
                    $message->from($address = $sender,$name);
                }
                else{
                    $message->from($address = $sender);
                }

                if($reply_to!=""&&$reply_to_name!=""){
                    $message->replyTo($reply_to, $reply_to_name);
                }

                $message->sender($address = $sender);

                if ($path_to_file != "" && is_file($path_to_file))
                {
                    $message->attach($path_to_file);
                }

                $message->bcc($emails)->subject($subject);

            });

        }

        return Mail::failures();
    }
}
