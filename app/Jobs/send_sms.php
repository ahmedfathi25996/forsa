<?php

namespace App\Jobs;

use App\helpers\utility;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class send_sms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mobile = "";
    private $body = "";

    public function __construct(string $mobile, string $body)
    {
        $this->mobile   = $mobile;
        $this->body     = $body;
    }


    public function handle()
    {

        if(!empty($this->mobile) && !empty($this->body)){

            $get_sms_balance = \jawalbsms::getBalance();
            if($get_sms_balance > 0)
            {
                \jawalbsms::sendSMS($this->body, "+20" . $this->mobile);
            }

        }

    }


}
