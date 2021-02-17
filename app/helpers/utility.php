<?php
declare(strict_types=1);

namespace App\helpers;

use App\models\notification_m;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class utility
{

    public static function get_admins($ids_only = false){
        $admins = User::whereIn("user_type",["admin","dev"])->get();

        if ($ids_only){
            return $admins->pluck("user_id")->all();
        }

        return $admins;
    }

    // TODO to be changed
    public static function send_notification_to_users($user_ids,$not_title,$not_type,$field_id){
        if(!isset_and_array($user_ids))return;

        $notifications_rows=[];

        $now=Carbon::now();

        foreach($user_ids as $user_id){
            $notifications_rows[]=[
                'not_title'=>$not_title,
                'not_type'=>$not_type,
                'to_user_id'=>$user_id,
                'target_id'=>$field_id,
                'created_at'=>$now
            ];
        }

        notification_m::insert($notifications_rows);
    }

    public static function updateEnvFile(array $array)
    {

        $envFile    = app()->environmentFilePath();
        $str        = file_get_contents($envFile);

        if (is_array($array) && count($array) > 0) {
            foreach ($array as $envKey => $envValue) {

                $str                    .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition            = strpos($str, "{$envKey}=");
                $endOfLinePosition      = strpos($str, "\n", $keyPosition);
                $oldLine                = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (is_bool($keyPosition) && ( !$keyPosition || !$endOfLinePosition || !$oldLine)) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        file_put_contents($envFile, $str);

    }

    public static function listPhoneCodes()
    {

        $phone_codes = [];
        $countryArray = list_phone_countries();

        $maping_countries = list_phone_codes();

        foreach($countryArray as $key => $country)
        {

            $placeholder = "";

            $code = strtoupper($country[1]);

            if(isset($maping_countries[$code]))
            {

                $mobile_begin_with = $maping_countries[$code]["mobile_begin_with"];
                if(isset($mobile_begin_with[0]))
                {

                    $mobile_begin_with = $mobile_begin_with[0];

                    $phone_number_lengths = $maping_countries[$code]["phone_number_lengths"];
                    if(isset($phone_number_lengths[0]))
                    {

                        $phone_number_lengths = $phone_number_lengths[0];
                        $mobile_begin_with_length = strlen($mobile_begin_with);

                        $placeholder = "$mobile_begin_with";

                        $remain_number = ($phone_number_lengths - $mobile_begin_with_length);
                        if($remain_number > 0)
                        {
                            for($ind = 0; $ind <$remain_number;$ind++)
                            {
                                $placeholder .= "$ind";
                            }
                        }

                    }

                }

            }

            $flag_image_name = strtolower($country[1]);

            $phone_codes[] = [
                "code"          => "+".$country[2],
                "name"          => $country[0],
                "placeholder"   => $placeholder,
                "image"         => url("public/images/flags/$flag_image_name.png")
            ];


        }

        return $phone_codes;

    }


    public static function check_valid_phone($phone_number)
    {

//        $response = [
//            "status"    => "success",
//            "data"      => []
//        ];
//
//        return $response;


        $response = [
            "status"    => "error",
            "data"      => []
        ];

        try {

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $phoneGeo = \libphonenumber\PhoneNumberToTimeZonesMapper::getInstance();
            $phoneCarrier = \libphonenumber\PhoneNumberToCarrierMapper::getInstance();

            $phone_number_obj = $phoneUtil->parse($phone_number);

            $region_code = $phoneUtil->getRegionCodeForNumber($phone_number_obj);
            $number_type = $phoneUtil->getNumberType($phone_number_obj);

            $is_valid = $phoneUtil->isValidNumber($phone_number_obj);
            $is_valid_from_region = $phoneUtil->isValidNumberForRegion($phone_number_obj,$region_code);

            $example_region_number = $phoneUtil->getExampleNumber($region_code);
            $timezones = $phoneGeo->getTimeZonesForNumber($phone_number_obj);

            $carrier_name = $phoneCarrier->getNameForNumber($phone_number_obj,"en");

            if($is_valid == false || $is_valid_from_region == false)
            {
                return $response;
            }

            $data = [
                "phone_number"                      => $phone_number,
                "region_code"                       => $region_code,
                "number_type"                       => $number_type,
                "is_valid_number"                   => $is_valid,
                "is_valid_number_from_region"       => $is_valid_from_region,
                "example_region_number"             => $example_region_number->getNationalNumber(),
                "timezone"                          => (isset($timezones[0])?$timezones[0]:""),
                "carrier_name"                      => $carrier_name,
            ];

            $response = [
                "status"    => "success",
                "data"      => $data
            ];

        } catch (\libphonenumber\NumberParseException $e) {
            return $response;
        }

        return $response;

    }

    public static function send_email_to_custom(
        $emails = array() ,
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
            $sender="info@forsa_tanya.com";
        }


        if (is_array($emails) && count($emails) > 0)
        {

            if (is_array($data) && count($data) > 0)
            {
                $view = "email.advanced";
            }
            else{
                $data = ["default"=>$data];
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

        return Mail:: failures();
    }



}
