<?php

namespace App\Services\Implementation;

use App\Adapters\IBrandAdapter;
use App\Adapters\IDoctorAdapter;
use App\Helpers\MessageHandleHelper;
use App\helpers\utility;
use App\Http\Controllers\traits\imagesTrait;
use App\models\doctors\certificates\certificates_m;
use App\models\doctors\doctors_m;
use App\models\doctors\ratings_m;
use App\models\doctors\doctors_sessions_m;
use App\Services\IBrandService;
use App\Services\IDoctorService;
use App\Transformers\BrandTransformer;
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
        $data = $this->adapter->listAllDoctors($cond);
        $result = $this->transform->transformListAllDoctors($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getSingleDoctor($request,$doctor_id)
    {
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));


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


        $data = $this->adapter->listAllDoctors($cond);
        $data = $data[0];
        $certificates_slider  =  $this->adapter->getCertificateSlider($data);
        $all_sessions = doctors_sessions_m::get_doctors_sessions($cond2);
        $today_sessions = doctors_sessions_m::get_doctors_sessions($cond3);
        $tomorrow_sessions = doctors_sessions_m::get_doctors_sessions($cond4);
        $ratings = ratings_m::get_doctors_ratings($cond5);

        $result = $this->transform->transformSingleDoctor($data,$certificates_slider,$all_sessions,$today_sessions,$tomorrow_sessions,$ratings);


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

    public function getAllRatings($user)
    {

        if($user->user_type != 'doctor')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $doctor = doctors_m::where("user_id",$user->user_id)->first();
        $doctor_id = $doctor->doctor_id;
        $cond = [];
        $cond[] = ["ratings.doctor_id","=",$doctor_id];
        $ratings = ratings_m::get_doctors_ratings($cond);
        $get_ratings = $this->transform->transformDoctorRatings($ratings);
        return $this->messageHandler->getJsonSuccessResponse("", $get_ratings);
    }



}
