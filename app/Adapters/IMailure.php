<?php

namespace App\Adapters;

interface IMailure{

    function sendEmail(
        array $emails = array() ,
        $data = "" ,
        $subject = "",
        $sender = "" ,
        $path_to_file = "",
        $name="",
        $reply_to="",
        $reply_to_name=""
    );

}