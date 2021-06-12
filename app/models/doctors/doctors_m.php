<?php

namespace App\models\doctors;

use App\models\attachments_m;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class doctors_m extends Model
{
    use SoftDeletes;

    protected $table      = "doctors";

    protected $primaryKey = "doctor_id";

    protected $dates      = ["deleted_at"];

    protected $fillable   =
        [
            'user_id', 'language','price','price_for_thirty',"certificates_ids",'years_of_experience','sessions_count','rating','video_id','session_duration'
            ,'temp_price','temp_years_of_experience','temp_video_id','temp_certificates_ids','is_available'
        ];

    public static $default_lang_id = 1;

    static function get_doctors(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = doctors_m::select(DB::raw("
            doctors.*,
            users.email,
            users.username,
            users.temp_email,
            users.temp_mobile_number,
            users.temp_gender,
            users.temp_age,
            users.temp_username,
            doctor_trans.full_name,
            doctor_trans.job_title,
            doctor_trans.country as doctor_country,
            doctor_trans.brief_bio,
            doctor_trans.specialties,
            doctor_img.path as doctor_image_path,
            doctor_img.id as doctor_img_id,
            doctor_video.path as doctor_video_path,
            doctor_video.id as doctor_video_id,
            doctor_trans.lang_id

        "))
            ->join("doctors_translate as doctor_trans", function ($join) use($default_lang_id){
                $join->on("doctor_trans.doctor_id","=","doctors.doctor_id")
                    ->where("doctor_trans.lang_id",$default_lang_id)
                    ->whereNull("doctor_trans.deleted_at");

            })->join("users", function ($join) use($default_lang_id){
                $join->on("users.user_id","=","doctors.user_id")
                    ->whereNull("users.deleted_at");

            })->leftJoin("attachments as doctor_img", function ($join){
                $join->on("users.logo_id","=","doctor_img.id")
                    ->whereNull("doctor_img.deleted_at");

            })->leftJoin("attachments as doctor_video", function ($join){
                $join->on("doctors.video_id","=","doctor_video.id")
                    ->whereNull("doctor_video.deleted_at");

            });

        if (is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $results        = $results->where($additional_and_wheres);
        }

        if (!empty($free_conditions))
        {
            $results        = $results->whereRaw($free_conditions);
        }

        if (!empty($order_by_col))
        {
            $results        = $results->orderBy("$order_by_col","$order_by_type");
        }

        if ($limit > 0)
        {
            $results        = $results->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
            $results        = $results->paginate($paginate);
        }
        else{
            $results        = $results->get();
        }

        if ($return_obj != "no")
        {
            if (is_array($results->all()) && count($results->all()))
            {
                $results    = $results->first();

                //get slider data
                $certificates_ids             = json_decode($results->certificates_ids);
                $results->slider_imgs   = array();
                if (is_array($certificates_ids) &&  count($certificates_ids) > 0) {

                    $slider_imgs            = attachments_m::whereIn("id",$certificates_ids)->get()->all();
                    $results->slider_imgs   = $slider_imgs;
                }

            }
            else{
                $results    = $results->first();
            }
        }

        return $results;

    }


    static function get_dashboard_doctors(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = doctors_m::select(DB::raw("
            doctors.*,
            users.email,
            users.username,
            users.temp_email,
            users.temp_mobile_number,
            users.temp_gender,
            users.temp_age,
            users.temp_username,
            doctor_trans.full_name,
            doctor_trans.job_title,
            doctor_trans.country as doctor_country,
            doctor_trans.brief_bio,
            doctor_trans.specialties,
            doctor_img.path as doctor_image_path,
            doctor_img.id as doctor_img_id,
            doctor_video.path as doctor_video_path,
            doctor_video.id as doctor_video_id,
            doctor_trans.lang_id

        "))
            ->join("doctors_translate as doctor_trans", function ($join) use($default_lang_id){
                $join->on("doctor_trans.doctor_id","=","doctors.doctor_id")
                    ->where("doctor_trans.lang_id",$default_lang_id)
                    ->whereNull("doctor_trans.deleted_at");

            })->join("users", function ($join) use($default_lang_id){
                $join->on("users.user_id","=","doctors.user_id")
                    ->whereNull("users.deleted_at");

            })->leftJoin("attachments as doctor_img", function ($join){
                $join->on("users.logo_id","=","doctor_img.id")
                    ->whereNull("doctor_img.deleted_at");

            })->leftJoin("attachments as doctor_video", function ($join){
                $join->on("doctors.temp_video_id","=","doctor_video.id")
                    ->whereNull("doctor_video.deleted_at");

            });

        if (is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $results        = $results->where($additional_and_wheres);
        }

        if (!empty($free_conditions))
        {
            $results        = $results->whereRaw($free_conditions);
        }

        if (!empty($order_by_col))
        {
            $results        = $results->orderBy("$order_by_col","$order_by_type");
        }

        if ($limit > 0)
        {
            $results        = $results->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
            $results        = $results->paginate($paginate);
        }
        else{
            $results        = $results->get();
        }

        if ($return_obj != "no")
        {
            if (is_array($results->all()) && count($results->all()))
            {
                $results    = $results->first();

                //get slider data
                $certificates_ids             = json_decode($results->certificates_ids);
                $results->slider_imgs   = array();
                if (is_array($certificates_ids) &&  count($certificates_ids) > 0) {

                    $slider_imgs            = attachments_m::whereIn("id",$certificates_ids)->get()->all();
                    $results->slider_imgs   = $slider_imgs;
                }

            }
            else{
                $results    = $results->first();
            }
        }

        return $results;

    }

    public static function listAllDoctors(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )

    {
        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = doctors_m::select(DB::raw("
            doctors.*,
            doctor_trans.full_name,
            doctor_trans.job_title,
            doctor_trans.country,
            doctor_trans.brief_bio,
            doctor_trans.specialties,
            doctor_img.path as doctor_image_path,
            doctor_img.id as doctor_img_id,
            doctor_video.path as doctor_video_path,
            doctor_video.id as doctor_video_id,
            doctor_trans.lang_id

        "))  ->join("doctors_translate as doctor_trans", function ($join) use($default_lang_id){
            $join->on("doctor_trans.doctor_id","=","doctors.doctor_id")
                ->where("doctor_trans.lang_id",$default_lang_id)
                ->whereNull("doctor_trans.deleted_at");

        })->join("users", function ($join) use($default_lang_id){
            $join->on("users.user_id","=","doctors.user_id")
                ->whereNull("users.deleted_at");

        })->leftJoin("attachments as doctor_img", function ($join){
            $join->on("users.logo_id","=","doctor_img.id")
                ->whereNull("doctor_img.deleted_at");
        })->leftJoin("attachments as doctor_video", function ($join){
            $join->on("doctors.video_id","=","doctor_video.id")
                ->whereNull("doctor_video.deleted_at");
        });
        if (is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $results        = $results->where($additional_and_wheres);
        }

        if (!empty($free_conditions))
        {
            $results        = $results->whereRaw($free_conditions);
        }

        if (!empty($order_by_col))
        {
            $results        = $results->orderBy("$order_by_col","$order_by_type");
        }

        if ($limit > 0)
        {
            $results        = $results->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
            $results        = $results->paginate($paginate);
        }
        else{
            $results        = $results->get();
        }

        if ($return_obj != "no")
        {
            $results    = $results->first();
        }

        return $results;


    }
    public static function get_certificates_slider($data)
    {

        if(is_object($data))
        {
            $certificates_ids = json_decode($data->certificates_ids);
            $data->certificates_ids = [];

            if (is_array($certificates_ids)&&  count($certificates_ids) >0) {

                $certificates_ids = attachments_m::whereIn("id",$certificates_ids)->get()->all();
                $data->certificates_ids = $certificates_ids;
            }

        }

        return $data;

    }




}
