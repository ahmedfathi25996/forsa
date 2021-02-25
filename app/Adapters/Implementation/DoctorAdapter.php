<?php

namespace App\Adapters\Implementation;

use App\Adapters\IDoctorAdapter;
use App\models\category\category_m;
use App\models\doctors\certificates\certificates_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\User;
use Carbon\Carbon;

class DoctorAdapter implements IDoctorAdapter
{

    function listAllDoctors($cond,$limit)
    {

        $result = doctors_m::listAllDoctors(
            $additional_and_wheres  = $cond, $free_conditions      = "",
            $order_by_col           = "rating", $order_by_type        = "desc",
            $limit                  , $offset =0    ,
            $paginate               = 12
        );

        return $result;
    }

   function listDoctorCertificates($cond)
   {
       $result = certificates_m::get_doctors_certificates($cond);
       return $result;
   }

   public function getCertificateSlider($data)
   {

        return doctors_m::get_certificates_slider($data);


   }

   public function createSession($data)
   {
       return doctors_sessions_m::create($data);
   }

   public function updateSession($data,$session_id)
   {
       return doctors_sessions_m::where("session_id",$session_id)->update($data);
   }

    function check_user_exist($cond)
    {
        return User::where($cond)->first();
    }


    function updateUserProfile($data,$user_id)
    {
        return User::find($user_id)->update([
            'temp_username' =>$data['username'],
            'temp_age' => $data['age'],
            'temp_gender' => $data['gender'],
            'temp_mobile_number' => $data['mobile_number'],
            'temp_email' => $data['email']
        ]);
    }

    function getDoctorBio($doctor_id)
    {

        $cond       = [];
        $cond[]     = ["doctors.doctor_id","=",$doctor_id];
        return doctors_m::get_doctors($additional_and_wheres = $cond)->all();
    }

    public function updateDoctorBio($data,$doctor_id)
    {
        $doctor =  doctors_m::where('doctor_id',$doctor_id)->first();
        return $doctor->update([
            "temp_price" => $data['price'],
            "temp_years_of_experience" => $data['years_of_experience'],
            "temp_video_id" => $data['video_id'],
            "temp_certificates_ids" => $data['certificates_ids']
        ]);

    }
}
