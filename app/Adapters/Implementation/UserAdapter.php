<?php

namespace App\Adapters\Implementation;

use App\Adapters\IUserAdapter;
use App\models\bookings\booking_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\models\notification_m;
use App\models\orders\orders_m;
use App\models\plans\plan_m;
use App\models\promo_code_m;
use App\models\redeem_rules_m;
use App\models\settings_m;
use App\models\support_messages_m;
use App\models\token_push\token_push_m;
use App\models\user_push_notifications_m;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class UserAdapter implements IUserAdapter {

    function check_user_exist($cond)
    {
        return User::where($cond)->first();
    }

    function getUserTypeEmailOrTemp($field)
    {

        return User::where([
            'user_provider' => "default"
        ])
            ->where(function($query) use($field)
            {
                $query->where("email", $field)
                    ->orWhere("temp_email", $field);
            })
            ->get()->first();
    }

    function getUserTypeNumberOrTemp($field)
    {

        return User::where([
            'user_provider' => "default"
        ])
            ->where(function($query) use($field)
            {
                $query->where("mobile_number", $field)
                    ->orWhere("temp_mobile_number", $field);
            })
            ->get()->first();
    }

    function getUserProfile($user_id)
    {
        $cond       = [];
        $cond[]     = ["users.user_id","=",$user_id];
        return User::get_users($additional_and_wheres = $cond)->all();
    }

    function createUser($data)
    {
        return User::create($data);
    }

    function updateUser($data, $email)
    {
        return User::where('email',$email)->update($data);
    }

    function updateUserObject($user)
    {
        return $user->update();
    }

    function updateUserProfile($data,$user_id)
    {
        return User::find($user_id)->update($data);
    }

    function getUsers()
    {
        return User::get()->all();

    }

    function deleteUser($email)
    {
        return User::where('email',$email)->delete();
    }

    function numberVerification($user_id,$number_verify){

        $user = User::findOrFail($user_id);

        if ($user->verification_code == $number_verify  &&  $user->verification_code_expiration  >= Carbon::now()){
            $user->is_active = 1;
            $user->is_verified = 1;
            $user->verification_code = 0;
            $user->update();

            return $user;
        } else {
            return false;
        }

    }

    function revokeToken($user)
    {

        return DB::table('oauth_access_tokens')->where('user_id',$user->user_id)->update(['revoked'=>1]);

    }

    function updateNumber($data,$user_id){
        return User::where('user_id',$user_id)->where('number_verify',0)->update($data);

    }

    public function pusToken($user_id, $data)
    {

        $token = (isset($data["token_mobile_push"])?$data["token_mobile_push"]:"");
        $device_type = (isset($data["device_type"])?$data["device_type"]:"");
        $app_version = (isset($data["App-Version"])?$data["App-Version"]:"");
        $device_name = (isset($data["Device-Name"])?$data["Device-Name"]:"");
        $device_os_version = (isset($data["Device-OS-Version"])?$data["Device-OS-Version"]:"");
        $device_udid = (isset($data["Device-UDID"])?$data["Device-UDID"]:"");

        if (token_push_m::where('user_id', $user_id)->where('device_type', $device_type)->update(['push_token'=>$token]))
        {
            return true;
        }
        else
        {

            $attributes = [];
            $attributes['push_token'] = $token;
            $attributes['device_type'] = $device_type;

            $value = [];
            $value['user_id'] = $user_id;
            $value['app_version'] = $app_version;
            $value['device_name'] = $device_name;
            $value['os_version'] = $device_os_version;
            $value['UDID'] = $device_udid;

            return token_push_m::updateOrCreate($attributes, $value);

        }

    }

    function getUserTokens($user_id)
    {
        return User::get_user_token($user_id);
    }

    function sendSupport($msg_arr)
    {
        return support_messages_m::create($msg_arr);
    }

    function getAdminIds()
    {
        return User::where("user_type","admin")->orWhere("user_type","dev")->pluck('user_id')->all();
    }

    function userNotifications($user_id)
    {
        $cond       = [];
        $cond[]     = ["user_push_notifications.user_id","=",$user_id];
        return user_push_notifications_m::get_notifications(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 4 , $return_obj       = "no");
    }

    function upcommingSessions($user_id)
    {
       $time =  date("H:i:s");
        $now = date('Y-m-d');
        $cond       = [];
        $cond[]     = ["booking.session_date",">=", $now];
        $cond[]     = ["booking.is_paid", "=" , 1];
        $cond[]     = ["new_doctors_sessions.is_done", "=" , 0];
        if(Auth::user()->user_type == "user")
        {
            $cond[]     = ["booking.user_id", "=" , $user_id];

        }else{
            $get_user = doctors_m::where("user_id",Auth::user()->user_id)->first();
            $cond[]     = ["new_doctors_sessions.doctor_id", "=" , $get_user->doctor_id];

        }


        $data = booking_m::get_user_bookings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no");

        return $data;
    }

    function previousSessions($user_id)
    {
        $now = date('Y-m-d');

        $cond       = [];
        $cond       = [];
        $cond[]     = ["booking.session_date","<", $now];
        $cond[]     = ["booking.is_paid", "=" , 1];
        if(Auth::user()->user_type == "user")
        {
            $cond[]     = ["booking.user_id", "=" , $user_id];

        }else{
            $get_user = doctors_m::where("user_id",Auth::user()->user_id)->first();
            $cond[]     = ["new_doctors_sessions.doctor_id", "=" , $get_user->doctor_id];

        }
        return booking_m::get_user_bookings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no");
    }

    function bookSession($data)
    {
        return booking_m::create($data);
    }

    function getBooking($book_id)
    {
        $cond[] = ["booking.book_id","=",$book_id];
        return booking_m::get_user_bookings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no"
        );
    }

    function checkPromoCode($code)
    {
        $cond       = [];
        $cond[]     = ["promo_code.code_text", "=" , $code];
        $cond[]     = ["promo_code.start_date", "<=" , Carbon::now()->toDateTimeString()];
        $cond[]     = ["promo_code.end_date", ">=" , Carbon::now()->toDateTimeString()];

        $promoCode  = promo_code_m::getApiPromoCodes(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 0 , $return_obj       = "yes"
        );

        return $promoCode;
    }

    function checkIfUserAllowedToRate($user_id,$doctor_id,$session_id)
    {
        $cond       = [];
        $cond[]     = ["booking.user_id", "=" , $user_id];
        $cond[]     = ["doctors_sessions.session_id", "=" , $session_id];
        $cond[]     = ["doctors_sessions.is_done", "=" , 0];
        $cond[]     = ["doctors_sessions.doctor_id", "=" , $doctor_id];

        $check = booking_m::get_user_bookings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 0 , $return_obj       = "yes"
        );
        return $check;
    }

    public function getNofifications($user_id)
    {
        $cond = [];
        $cond[] = ['notifications.to_user_id',"=",$user_id];
        return notification_m::get_notifications($cond);
    }




}
