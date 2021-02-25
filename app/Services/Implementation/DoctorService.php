<?php

namespace App\Services\Implementation;

use App\Adapters\IDoctorAdapter;
use App\Helpers\MessageHandleHelper;
use App\helpers\utility;
use App\Http\Controllers\RtcTokenBuilder;
use App\Http\Controllers\traits\imagesTrait;
use App\models\bookings\booking_m;
use App\models\doctors\certificates\certificates_m;
use App\models\doctors\doctors_m;
use App\models\doctors\ratings_m;
use App\models\doctors\doctors_sessions_m;
use App\models\notification_m;
use App\models\settings_m;
use App\models\wallet_history_m;
use App\models\wallet_transactions_m;
use App\Notifications\mail\SessionReminder;
use App\Notifications\mail\WalletNotification;
use App\Services\IDoctorService;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class DoctorService implements IDoctorService {

    use DispatchesJobs;
    use imagesTrait;


    protected $adapter;
    protected $transform;
    protected $messageHandle;

    public function __construct(IDoctorAdapter $adapter, MessageHandleHelper $messageHandle, UserTransformer $transform) {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;
        $this->transform= $transform;

    }

    public function listAllDoctors($request)
    {
        $cond = [];
        $limit = 0;
        if(isset($request['limit']) && $request['limit'] != 0)
        {
            $limit = $request['limit'];
        }
        $data = $this->adapter->listAllDoctors($cond,$limit);
        $result = $this->transform->transformListAllDoctors($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getSingleDoctor($request,$doctor_id)
    {
        $limit = 0;
        if(isset($request['limit']) && $request['limit'] != 0)
        {
            $limit = $request['limit'];
        }
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));

        $day_after_tomorrow = date('Y-m-d', strtotime(' +2 day'));


        $cond2 = [];
        $cond[] = ["doctors.doctor_id","=",$doctor_id];
        $cond2[] = ["doctors_sessions.doctor_id","=",$doctor_id];
        $cond2[] = ["doctors_sessions.is_done","=",0];
        $cond2[] = ["doctors_sessions.is_verified_by_admin","=",1];

        $cond3[] = ["doctors_sessions.session_date","=",$now];
        $cond3 = array_merge($cond2,$cond3);
        $cond4[] = ["doctors_sessions.session_date","=",$tomorrow];
        $cond4 = array_merge($cond2,$cond4);
        $cond5 = [];
        $cond5[] = ["ratings.doctor_id","=",$doctor_id];
        $cond6[] = ["doctors_sessions.session_date","=",$day_after_tomorrow];
        $cond6 = array_merge($cond2,$cond6);



        $data = $this->adapter->listAllDoctors($cond,$limit);
        $data = $data[0];
        $certificates_slider  =  $this->adapter->getCertificateSlider($data);
        $all_sessions = doctors_sessions_m::get_doctors_sessions($cond2);
        $today_sessions = doctors_sessions_m::get_doctors_sessions($cond3);
        $tomorrow_sessions = doctors_sessions_m::get_doctors_sessions($cond4);
        $day_after_tomorrow = doctors_sessions_m::get_doctors_sessions($cond6);
        $ratings = ratings_m::get_doctors_ratings($cond5);

        $result = $this->transform->transformSingleDoctor($data,$certificates_slider,$all_sessions,$today_sessions,$tomorrow_sessions,$day_after_tomorrow,$ratings);


        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function addNewSession($data,$user)
    {
        if($user->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("Unauthraized");

        }

        #region check if date is valid
        $now = date('Y-m-d');
        if($now > $data['session_date'])
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.date_error"));
        }
        #endregion


        #region check if session is exist
        $get_doctor = doctors_m::where("user_id",$user->user_id)->first();
        $duration = $get_doctor->session_duration * 60;
        #endregion
        $session_date = $data['session_date'];

        $get_session = doctors_sessions_m::where("session_date",$data['session_date'])->
        where("doctor_id",$get_doctor->doctor_id)->first();
        if($get_session !== null)
        {
            doctors_sessions_m::where("session_date",$data['session_date'])->
            where("doctor_id",$get_doctor->doctor_id)->forceDelete();
        }
        foreach($data['schedule'] as $sch)
        {
            $data['session_date'] = $session_date;
            $data['is_booked'] = $sch['is_booked'];
            $data['is_done'] = 0;
            $data['doctor_id'] = $get_doctor->doctor_id;
            $data['is_verified_by_admin'] = 1;
            $data["time_from"]       = date("H:i", strtotime($sch["time_from"]));
            $time_from = strtotime($sch['time_from']);
            $minutes = $time_from + $duration ;
            $endDate = date('H:i', $minutes);
            $data["time_to"]         = $endDate;

            $this->adapter->createSession($data);


        }

        return $this->messageHandler->getJsonSuccessResponse(Lang::get("general.session_added"));


    }

    public function editSession($data,$user,$session_id)
    {
        if($user->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("Unauthraized");

        }



        #region check if date is valid
        $now = date('Y-m-d');
        if($now > $data['session_date'])
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.date_error"));
        }
        #endregion





        #region check if session is exist
        $get_doctor = doctors_m::where("user_id",$user->user_id)->first();
        $get_session = doctors_sessions_m::where("session_date",$data['session_date'])
            ->where("time_from",$data['time_from'])->
            where("doctor_id",$get_doctor->doctor_id)->where("session_id","!=",$session_id)->first();
        if(is_object($get_session))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.session_exist"));
        }
        #endregion
        $data['is_verified_by_admin'] = 1;
        $data["time_from"]       = date("H:i:s", strtotime($data["time_from"]));
        $data["time_to"]         = date("H:i:s", strtotime($data["time_to"]));
        $session = $this->adapter->updateSession($data,$session_id);
        return $this->messageHandler->getJsonSuccessResponse(Lang::get("general.session_added"));


    }

    function updateProfile($data, $user)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }

        $user_id    = $user->user_id;
        $user_type = $user->user_type;
        $mobile_number = $data['mobile_number'];
        $email = $data['email'];
        #region check if mobile_number exist same user_type with this mobile_number

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "mobile_number" => $mobile_number,
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id != $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_mobile_number"));
            }

        }

        #endregion


        $data["mobile_number"]  = ltrim($data["mobile_number"], '0');


        #region change email
        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "email"         => $email,
                "user_provider" => "default"
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id != $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_email"));
            }

        }
        #endregion
        $this->adapter->updateUserProfile($data->all(),$user_id);

        $msg = Lang::get("Updated Successfully and waiting for approval");

        return $this->messageHandler->postJsonSuccessResponse($msg,[]);

    }

    public function getDoctorBio($user)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $user_id    = $user->user_id;
        $doctor = doctors_m::where("user_id",$user_id)->first();
        $doctor_id = $doctor->doctor_id;
        $get_user = $this->adapter->getDoctorBio($doctor_id);

        if(!is_array($get_user) || !count($get_user))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        $cond[] = ["doctors.doctor_id","=",$doctor_id];
        $data = $this->adapter->listAllDoctors($cond);
        $data = $data[0];
        $certificates_slider  =  $this->adapter->getCertificateSlider($data);
        $get_user = $this->transform->transformDoctorBio($data,$certificates_slider);
        return $this->messageHandler->getJsonSuccessResponse("", $get_user);

    }

    public function updateDoctorBio($request,$user)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $user_id    = $user->user_id;
        $doctor = doctors_m::where("user_id",$user_id)->first();
        $doctor_id = $doctor->doctor_id;

        $request["video_id"]        = $this->general_save_img(
            $request,
            $item_id              = "",
             "video",
            $new_title            = "",
            $new_alt              = "",
            $upload_new_img_check = "on",
            $upload_file_path     = "/doctors",
            $width                = 0,
            $height               = 0,
            $photo_id_for_edit    = $doctor->video_id
        );

        $request["certificates_ids"] = $this->general_save_slider(
            $request,
            $field_name = "certificates_slider_file",
            $width = 0,
            $height = 0,
            $new_title_arr = "",
            $new_alt_arr = "",
            $json_values_of_slider = $request["json_values_of_slidernews_slider_file"],
            $old_title_arr = "",
            $old_alt_arr = "",
            $path = "/doctors/certificates"
        );

        $request["certificates_ids"] = json_encode($request["certificates_ids"]);


        $this->adapter->updateDoctorBio($request->all(),$doctor_id);


        $msg = Lang::get("Updated Successfully and waiting for approval");

        return $this->messageHandler->postJsonSuccessResponse($msg,[]);

    }


    public function getDoctorRatings($user,$session_id)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $cond = [];
        $cond[] = ["ratings.session_id","=",$session_id];
        $ratings = ratings_m::get_doctors_ratings($cond);
        $get_ratings = $this->transform->transformDoctorRatings($ratings);
        return $this->messageHandler->getJsonSuccessResponse("", $get_ratings);

    }

    public function listSchedule($request)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $user = Auth::user();
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $duration = $doctor->session_duration;
        $a = '09:00';
        $b = '24:00';
        $time_duration = "PT".$duration."M";
        $array = array();

        $period = new \DatePeriod(
            new \DateTime($a),
            new \DateInterval($time_duration),
            new \DateTime($b)
        );


        foreach ($period as $date) {
            $array[] =  $date->format("H:i");
        }


        $schedule = $this->transform->transformSessionsScedule($array,$request);
        return $this->messageHandler->getJsonSuccessResponse("", $schedule);



    }

    public function getAllRatings($user,$request)
    {

        if($user->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $limit = 0;
        if(isset($request['limit']) && $request['limit'] != 0)
        {
            $limit = $request['limit'];
        }
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $doctor_id = $doctor->doctor_id;
        $cond = [];
        $cond[] = ["ratings.doctor_id","=",$doctor_id];
        $ratings = ratings_m::get_doctors_ratings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  , $offset           = 0,
            $paginate               = 0 , $return_obj       = "no"
        );
        $get_ratings = $this->transform->transformDoctorRatings($ratings);
        return $this->messageHandler->getJsonSuccessResponse("", $get_ratings);
    }

    public function joinSession($session_id,$channel_name,$token)
    {
        $appid = "0e03caa49a7c4594b60ad8178b1d9880";
        return view("front.video",compact('token','channel_name','appid','session_id'));

    }

    public function startSession($session_id)
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $current_time = time();

        $user = Auth::user();
        $get_session = doctors_sessions_m::where("session_id",$session_id)->first();
        $session_date = $get_session->session_date;
        $time_from = $get_session->time_from;
        $session_end_time = $session_date." ".$get_session->time_to;
        $date_time = new \DateTime($session_end_time);
        $session_time = $date_time->getTimestamp();

        #check if session is done
        if($get_session->is_done == 1)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("you can not start session because it is done");

        }

        if($current_time > $session_time)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("This session is finished");

        }

        #endregion

        #check if doctor start session more than 5 minutes early
        $session_start_time = $session_date."".$time_from;

        $date_time = new \DateTime($session_start_time);
        $session_start_time = $date_time->getTimestamp();

        $time = new \DateTime($session_date." ".$time_from);
        $diff = $time->diff(new \DateTime());
        $minutes = ($diff->days * 24 * 60) +
            ($diff->h * 60) + $diff->i;

        if($diff->format("%r%a") != "0")
        {
            if( $minutes > 5)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse("You cannot start the session earlier than 5 minutes");

            }

        }


        #endregion


        #region generate token and channel name
        $appid = "0e03caa49a7c4594b60ad8178b1d9880";
        $channel_name  = md5("#!@!#!*&*(&" . "sponsor_btm" . "#!@!#!*&*(&" . time() . random_bytes(5));
        $session_date = $get_session->session_date;
        $time_to = $get_session->time_to;
        $time = strtotime($session_date." ".$time_to);
        $token = RtcTokenBuilder::buildTokenWithUid($appid,'5df0bc7ecb1e4f0686f9c3f154148167',$channel_name,null,1,$time);

        while (strpos($token, '/') !== false) {
            $token = RtcTokenBuilder::buildTokenWithUid($appid,'5df0bc7ecb1e4f0686f9c3f154148167',$channel_name,null,1,$time);
        }

        #endregion


        $booking = booking_m::where("session_id",$session_id)->first();
         $booking->update([
            "channel_name" => $channel_name,
            "session_token" => $token
         ]);

        notification_m::create([
            "to_user_id" => $booking->user_id,
            "to_user_type" => "user",
            "not_type" => "session_reminder",
            "not_title" => "Your Doctor Started The Session ".$session_date." ".$time_from." please join him"
        ]);
        return $this->messageHandler->getJsonSuccessResponse("", [
            "url" => url("/api/session/$session_id/join/$booking->channel_name/$booking->session_token")
        ]);

       // return redirect("/api/session/join/$channel_name/$token");



    }

    public function updateSessionStatus($request)
    {
        $booking = booking_m::where("book_id",14)->first();
        $booking->update([
            'doctor_join' => 1
        ]);
    }

    public function afterSessionActions($request,$session_id)
    {
        $session = doctors_sessions_m::where("session_id",$session_id)->first();
        $booking = booking_m::where("session_id",$session_id)->first();
        $get_user = User::where("user_id",$booking->user_id)->first();

        if($session->is_done == 1)
        {
            return;
        }

        if($booking->is_done == 1)
        {
            return;
        }
        $session->update([
           "is_done" => 1
        ]);

        $booking->update([
           "is_done" => 1
        ]);

        $doctor_id = $session->doctor_id;
        $doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $user = User::where("user_id",$doctor->user_id)->first();

        $settings = settings_m::get_settings();
        $settings = $settings->groupBy("setting_key")->all();
        $website_percentage = $settings["website_percentage"][0]->setting_value;

        $price_after_website_percentage = $booking->price_after_discount * ($website_percentage/100);
        $last_price = $booking->price_after_discount - $price_after_website_percentage;

        $user->increment("user_wallet",$last_price);
        wallet_history_m::create([
           "doctor_id" => $doctor_id,
           "value"    => $last_price,
            "is_done"  => 0,
            "value_for" => "You received ".$last_price." EG In your wallet for the session with ".$get_user->username." at ".$session->session_date." ".$session->time_from
        ]);

        notification_m::create([
            "to_user_id" => $doctor->user_id,
            "to_user_type" => "doctor",
            "not_type" => "Your Wallet",
            "not_title" => "You received ".$last_price." EG In your wallet for the session with ".$get_user->username." at ".$session->session_date." ".$session->time_from
        ]);
        $user->notify((new WalletNotification($user,$session->time_from,$session->time_to,$get_user->username,$last_price)));
    }

    public function getBookedDoctorSessionsHome($request)
    {
        $user = Auth::user();
        $date = $request->date;
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $cond = [];
        $cond[] = ["doctors.doctor_id","=",$doctor->doctor_id];
        $cond[] = ['doctors_sessions.is_booked',"=",1];
        $cond[] = ["booking.is_paid", "=" , 1];
        $cond[] = ['doctors_sessions.session_date',"=",$date];
        $bookings = booking_m::get_user_bookings($cond);
        if(is_array($bookings->all()) && count($bookings->all()) > 0)
        {
            $result = $this->transform->transformHomeBookedSessions($bookings);
            return $this->messageHandler->getJsonSuccessResponse("", $result);
        }
        return $this->messageHandler->getJsonNotFoundErrorResponse("There is no sessions booked for this day");


    }

    public function getDoctorWallet()
    {
        if(Auth::user()->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $user = Auth::user();
        $get_doctor = doctors_m::where('user_id',$user->user_id)->first();
        $doctor_id = $get_doctor->doctor_id;

        $cond = [];
        $cond[] = ["wallet_transactions.doctor_id","=",$doctor_id];
        $wallet = wallet_transactions_m::get_wallet_transactions(
            $additional_and_wheres  = $cond
        );
        $get_ratings = $this->transform->transformDoctorWallet($wallet);
        return $this->messageHandler->getJsonSuccessResponse("", $get_ratings);

    }



}
