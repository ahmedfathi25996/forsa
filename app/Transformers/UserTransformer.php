<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 23/11/17
 * Time: 10:05 م
 */

namespace App\Transformers;

use App\models\doctors\certificates\certificates_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\models\doctors\doctors_specialites_m;
use App\models\doctors\ratings_m;
use App\models\specialites\specialites_m;
use App\models\specialites\specialites_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class UserTransformer extends Transformer
{

    public static $default_lang_id = 1;

    /**
     * method to custom transform an item
     * @param  [mixed] $item [item to be transformed]
     * @return [mixeed]       [counts of the implementation in child class]
     */
    public function transform($item)
    {
        $data = [];
        $data['user_id'] = isset($item['user_id'])?intval($item['user_id']):0;
        $data['token'] = isset($item['token'])?$item['token']:'';
        $data['username'] = isset($item['username'])?$item['username']:'';
        $data['email'] = isset($item['email'])?$item['email']:'';

            $data['image'] = url("public/images/no_image.png");

            if(isset($item['logo_path']) && !empty($item['logo_path']) && $item['logo_path'] != "T")
            {
                $data['image'] = url($item['logo_path']);
            }



        return $data;

    }

    public function transformUserProfile($item)
    {
        $data = [];
        $data['user_id'] = isset($item['user_id'])?intval($item['user_id']):0;
        $data['username'] = isset($item['username'])?$item['username']:'';
        $data['email'] = isset($item['email'])?$item['email']:'';

            $data['image'] = url("public/images/no_image.png");
            if(isset($item['logo_path']) && !empty($item['logo_path']) && $item['logo_path'] != "T")
            {
                $data['image'] = url($item['logo_path']);
            }


        $data['age']    = isset($item['age'])?$item['age']:0;
        $data['mobile_number']    = isset($item['mobile_number'])?$item['mobile_number']:0;
        $data['gender']    = isset($item['gender'])?$item['gender']:"";
        if(Auth::user()->user_type == "user")
        {
            $data['is_treated_before'] = isset($item['is_treated_before'])?$item['is_treated_before']:0;
            $data['diagnosis']    = isset($item['diagnosis'])?$item['diagnosis']:"";
            $data['forsa_tanya_knowing'] = isset($item['forsa_tanya_knowing'])?$item['forsa_tanya_knowing']:"";
        }

        $data['user_wallet']      = isset($item['user_wallet'])?floatval($item['user_wallet']):0;
        $data['user_provider']    = isset($item['user_provider'])?$item['user_provider']:'';


        return $data;
    }

    public function transformUserOrders($orders)
    {
        $allData = [];
        foreach ($orders as $order){
            $item = [];

            $item["order_id"]     = isset($order["order_id"])?intval($order["order_id"]):0;
            $item['offer_title']  = isset($order['offer_title'])?$order['offer_title']:'';
            $item["offer_type"]   = isset($order["offer_type_name"])?$order["offer_type_name"]:'';
            $item["order_date"]   = isset($order["order_date"])?$order["order_date"]:'';
            $item['offer_image']  =url("public/images/no_image.png");
            if(!empty($order["logo_path"]) && $order["logo_path"] != "T")
            {
                $item['offer_image'] = isset($order["logo_path"])?url($order["logo_path"]):'';
            }
            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformUserNotifications($notifications)
    {
        $allData = [];
        foreach ($notifications as $not){
            $item = [];

            $item["not_id"]             = isset($not["id"])?intval($not["id"]):0;
            $item['user_id']            = isset($not['user_id'])?$not['user_id']:0;
            $item["not_title"]          = isset($not["not_title"])?$not["not_title"]:'';
            $item["not_body"]           = isset($not["not_body"])?$not["not_body"]:'';
            $item["notification_date"]  = isset($not["notification_date"])?$not["notification_date"]:'';
            $item['image']              = url("public/images/no_image.png");
            $item["additional_data"]    = isset($not["additional_data"])?json_decode($not["additional_data"],true):[];

            $allData[] = $item;
        }

        return array_values($allData);
    }


    public function transformRedeemRules($rules)
    {
        $allData = [];
        foreach ($rules as $rule){
            $item = [];

            $item["red_id"]          = isset($rule["red_id"])?intval($rule["red_id"]):0;
            $item['redeem_money']    = isset($rule['redeem_money'])?$rule['redeem_money']:0;
            $item["redeem_points"]   = isset($rule["redeem_points"])?$rule["redeem_points"]:0;

            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformUserWallet($item)
    {
        $data = [];
        $data['user_id']            = isset($item['user_id'])?intval($item['user_id']):0;
        $data['user_wallet']        = isset($item['user_wallet'])?$item['user_wallet']:0;
        $data['user_points']        = isset($item['user_points'])?$item['user_points']:0;

        return $data;
    }

    public function transformListAllDoctors($doctors)
    {
        $data = [];
        $allData = [];


        foreach($doctors as $item)
        {
            $avg  = ratings_m::where("doctor_id",$item->doctor_id)->avg("rate");

            $data['id']             = isset($item->doctor_id)?$item->doctor_id:0;
            $data['doctor_name']           = isset($item->full_name)?$item->full_name:"";
            $data['job_title']       = isset($item->job_title)?$item->job_title:"";
            $data['price']          = isset($item->price)?$item->price:0;
            $data['price_for_thirty_minutes']          = isset($item->price_for_thirty)?$item->price_for_thirty:0;
            $data['specialties']          = isset($item->specialties)?$item->specialties:"";
            $data['rating']          = isset($avg)?number_format($avg,2):0;
            $data['image']          =url("public/images/no_image.png");
            if(!empty($item->doctor_image_path) && $item->doctor_image_path != "T")
            {
                $data['image'] = isset($item->doctor_image_path)?url($item->doctor_image_path):'';
            }

            $allData[] = $data;
        }

        return $allData;
    }

    private function doctorSpecialites($specialites)
    {
        $allData = [];
        foreach ($specialites as $spe){
            $item = [];
            $cond[] = ["specialites.spe_id","=",$spe];

            $default_lang_id        = Config('lang_id');

            if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
                $default_lang_id    =  self::$default_lang_id;
            $data = specialites_m::select(DB::raw("
            specialites.*,
            spec_trans.title,
            spec_trans.lang_id

        "))
                ->join("specialites_translate as spec_trans", function ($join) use($default_lang_id){
                    $join->on("spec_trans.spe_id","=","specialites.spe_id")
                        ->where("spec_trans.lang_id",$default_lang_id)
                        ->whereNull("spec_trans.deleted_at");

                })->where("specialites.spe_id",$spe)->first();

            $item['title']  = isset($data->title)?$data->title:'';
            $allData[] = $item;
        }

        return $allData;
    }


    public function transformSingleDoctor($item,$certificates_slider,$sessions,$today_sessions,$tomorrow_sessions,$ratings)
    {
        $avg  = ratings_m::where("doctor_id",$item['doctor_id'])->avg("rate");

        $data['id']             = isset($item->doctor_id)?$item->doctor_id:0;
        $data['doctor_name']           = isset($item->full_name)?$item->full_name:"";
        $data['job_title']       = isset($item->job_title)?$item->job_title:"";
        $data['country']       = isset($item->country)?$item->country:"";
        $data['brief_bio']       = isset($item->brief_bio)?$item->brief_bio:"";
        $data['price']          = isset($item->price)?$item->price:0;
        $data['price_for_thirty_minutes']          = isset($item->price_for_thirty)?$item->price_for_thirty:0;
        $data['rating']          = isset($avg)?number_format($avg,2):0;
        $data['sessions_count']          = isset($item->sessions_count)?$item->sessions_count:0;
        $data['specialties']          = isset($item->specialties)?$item->specialties:"";
        $data['image']          =url("public/images/no_image.png");
        if(!empty($item->doctor_image_path) && $item->doctor_image_path != "T")
        {
            $data['image'] = isset($item->doctor_image_path)?url($item->doctor_image_path):'';
        }
        $data['video']          =url("public/images/no_image.png");
        if(!empty($item->doctor_video_path))
        {
            $data['video'] = isset($item->doctor_video_path)?url($item->doctor_video_path):'';
        }
        $data['certificates_slider'] = [];
        if(isset($item["certificates_ids"]) && is_array($item["certificates_ids"]) && count($item["certificates_ids"]))
        {

            $certificates_slider = [];
            foreach($item["certificates_ids"] as $key => $img)
            {

                if(!empty($img->path) && $img->path != "T")
                {
                    $certificates_slider[] = url($img->path);
                }

            }

            $data['certificates_slider'] = $certificates_slider;

        }
        $data['today_sessions'] = [];
        $data['today_sessions'] = $this->doctorSessions($today_sessions);
        $data['tomorrow_sessions'] = [];
        $data['tomorrow_sessions'] = $this->doctorSessions($tomorrow_sessions);
        $data['all_doctor_sessions'] = [];
        $data['all_doctor_sessions'] = $this->doctorSessions($sessions);
        $data['ratings'] = [];
        $data['ratings'] = $this->doctorsRatings($ratings);

        return $data;
    }

    private function doctorSessions($sessions)
    {
        $allData = [];
        foreach ($sessions as $cer){
            $item = [];
            $item["session_id"]     = isset($cer["session_id"])?intval($cer["session_id"]):0;
            $item['session_date']  = isset($cer['session_date'])?$cer['session_date']:'';
            $from_type = "AM";
            if($cer['time_from'] > "12:00:00" )
            {
                $from_type = "PM";
            }
            $to_type = "AM";
            if($cer['time_to'] > "12:00:00")
            {
                $to_type = "PM";

            }
            $item["time_from"]          = isset($cer["time_from"])?date('h:i',strtotime($cer["time_from"]))." ".$from_type:'';
            $item["time_to"]          = isset($cer["time_to"])?date('h:i',strtotime($cer["time_to"]))." ".$to_type:'';
            $item['is_booked']  = isset($cer['is_booked'])?$cer['is_booked']:0;

            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformUserSessions($sessions)
    {

        $allData = [];
        foreach ($sessions as $session){
            $item = [];
            #end region
            $item["booking_id"]             = isset($session["book_id"])?intval($session["book_id"]):0;
            $item['session_date']            = isset($session['session_date'])?$session['session_date']:"";
            $from_type = "AM";
            if($session['time_from'] > "12:00:00" )
            {
                $from_type = "PM";
            }
            $to_type = "AM";
            if($session['time_to'] > "12:00:00")
            {
                $to_type = "PM";
            }
            $item["time_from"]          = isset($session["time_from"])?date('h:i',strtotime($session["time_from"]))." ".$from_type:'';
            $item["time_to"]          = isset($session["time_to"])?date('h:i',strtotime($session["time_to"]))." ".$to_type:'';
            $item["session_token"]   = isset($session['session_token'])?$session['session_token']:"";
            $item["channel_name"]   = isset($session['channel_name'])?$session['channel_name']:"";


            if(Auth::user()->user_type == "doctor")
            {
                $item["user_name"]           = isset($session["username"])?$session["username"]:'';
                $item["user_age"]           = isset($session["age"])?$session["age"]:'';




            }else{
                $item["doctor_name"]           = isset($session["full_name"])?$session["full_name"]:'';
                $item["doctor_job_title"]           = isset($session["job_title"])?$session["job_title"]:'';
                $item["doctor_price"]           = isset($session["price"])?$session["price"]:0;
                $item["doctor_rating"]           = isset($session["rating"])?intval($session["rating"]):0;
                $item["doctor_session_count"]           = isset($session["sessions_count"])?intval($session["sessions_count"]):0;

            }

            $item['image']          =url("public/images/no_image.png");
            if(!empty($session->user_image_path) && $session->user_image_path != "T")
            {
                $item['image'] = isset($session->user_image_path)?url($session->user_image_path):'';
            }



            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformBooking($item)
    {
        $data['booking_id']             = isset($item['book_id'])?$item['book_id']:0;
        $data['doctor_name']           = isset($item['full_name'])?$item['full_name']:"";
        $data['price']       = isset($item['price_after_discount'])?$item['price_after_discount']:0;
        $data['session_date']       = isset($item['session_date'])?$item['session_date']:"";
        $data['time_from']       = isset($item['time_from'])?$item['time_from']:"";
        $data['time_to']          = isset($item['time_to'])?$item['time_to']:"";
        $data['image']          =url("public/images/no_image.png");
        if(!empty($item['doctor_image_path']) && $item['doctor_image_path'] != "T")
        {
            $data['image'] = isset($item['doctor_image_path'])?url($item['doctor_image_path']):'';
        }
        return $data;
    }

    public function doctorsRatings($ratings)
    {
        $request = new Request();
        $allData = [];
        foreach ($ratings as $rate){
            $item = [];
            $item["rate_id"]             = isset($rate["rate_id"])?intval($rate["rate_id"]):0;
            $item['rate']          = isset($rate['rate'])?number_format($rate['rate'],2):0;
            $item['message']            = isset($rate['message'])?$rate['message']:"";
            $item["username"]           = isset($rate["username"])?$rate["username"]:'';
            $now = time();
            $your_date = strtotime($rate['created_at']);
            $datediff = $now - $your_date;
            $date =  round($datediff / (60 * 60 * 24));
            $item['ratings_since_date']  = isset($rate['created_at'])?$date." day":"";

            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformDoctorBio($item,$certificates_slider)
    {
        $data = [];
        $data['job_title'] = isset($item['job_title'])?$item['job_title']:'';
        $data['price'] = isset($item['price'])?$item['price']:'';
        $data['brief_bio']    = isset($item['brief_bio'])?$item['brief_bio']:"";
        $data['years_of_experience'] = isset($item['years_of_experience'])?$item['years_of_experience']:0;
        $data['video']          =url("public/images/no_image.png");
        if(!empty($item['doctor_video_path']))
        {
            $data['video'] = isset($item['doctor_video_path'])?url($item['doctor_video_path']):'';
        }
        $data['certificates_slider'] = [];
        if(isset($item["certificates_ids"]) && is_array($item["certificates_ids"]) && count($item["certificates_ids"]))
        {

            $certificates_slider = [];
            foreach($item["certificates_ids"] as $key => $img)
            {

                if(!empty($img->path) && $img->path != "T")
                {
                    $certificates_slider[] = url($img->path);
                }

            }

            $data['certificates_slider'] = $certificates_slider;

        }
        return $data;
    }

    public function transformDoctorRatings($ratings)
    {
        $request = new Request();
        $allData = [];
        foreach ($ratings as $rate){
            $item = [];
            $item['rate']          = isset($rate['rate'])?number_format($rate['rate'],2):0;
            $item['message']            = isset($rate['message'])?$rate['message']:"";
            $item["username"]           = isset($rate["username"])?$rate["username"]:'';
            $now = time();
            $your_date = strtotime($rate['created_at']);
            $datediff = $now - $your_date;
            $date =  round($datediff / (60 * 60 * 24));
            if($date == 0)
            {
                $item['ratings_since_date'] = "Today";
            }elseif ($date == 1)
            {
                $item['ratings_since_date'] = "Yesterday";

            }
            else{
                $item['ratings_since_date']  = isset($rate['created_at'])?$date ." day":"";

            }

            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformNotifications($notifications)
    {

        $allData = [];
        foreach ($notifications as $not){
            $item = [];
            #end region
            $item["not_id"]             = isset($not["not_id"])?intval($not["not_id"]):0;
            $item['not_title']            = isset($not['not_title'])?$not['not_title']:"";

            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformSessionsScedule($sessions,$request)
    {
        $today = date("Y-m-d");
        $today_1 = date("Y-m-d", strtotime("+1 day"));
        $today_2 = date("Y-m-d", strtotime("+2 day"));
        $today_3 = date("Y-m-d", strtotime("+3 day"));
        $today_4 = date("Y-m-d", strtotime("+4 day"));
        $today_5 = date("Y-m-d", strtotime("+5 day"));
        $today_6 = date("Y-m-d", strtotime("+6 day"));


        $data[$today] = [];
        $data[$today] = $this->scheduleForToday($sessions,$today);

        $data[$today_1] = [];
        $data[$today_1] = $this->scheduleForToday_1($sessions,$today_1);

        $data[$today_2] = [];
        $data[$today_2] = $this->scheduleForToday_2($sessions,$today_2);

        $data[$today_3] = [];
        $data[$today_3] = $this->scheduleForToday_3($sessions,$today_3);

        $data[$today_4] = [];
        $data[$today_4] = $this->scheduleForToday_4($sessions,$today_4);

        $data[$today_5] = [];
        $data[$today_5] = $this->scheduleForToday_5($sessions,$today_5);

        $data[$today_6] = [];
        $data[$today_6] = $this->scheduleForToday_6($sessions,$today_6);

        return $data;

    }

    private function scheduleForToday($sessions,$today)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_1($sessions,$today_1)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_1;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_2($sessions,$today_2)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_2;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_3($sessions,$today_3)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_3;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_4($sessions,$today_4)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_4;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_5($sessions,$today_5)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_5;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

    private function scheduleForToday_6($sessions,$today_6)
    {

        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $date = $today_6;

        foreach ($sessions as $key=>$value){

            $item = [];
            $check = doctors_sessions_m::where("session_date",$date)->where("doctor_id",$doctor->doctor_id)->where("time_from",$value."00")->first();
            if ($check)
            {
                $item["time"]          = $value;
                $item['is_selected']   = 1;
                $item['is_booked']     = $check->is_booked;


            }else{
                $item["time"]          = $value;
                $item['is_selected']   = 0;
                $item['is_booked']     = 0;


            }


            $allData[] = $item;
        }

        return array_values($allData);
    }

}
