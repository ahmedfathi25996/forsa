<?php

namespace App\models\bookings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class booking_m extends Model
{
    use SoftDeletes;

    protected $table      = "booking";

    protected $primaryKey = "book_id";

    protected $dates      = ["deleted_at"];

    protected $fillable   =
        [
            'user_id', 'session_id','is_paid','is_done','price_after_discount','rate','channel_name','session_token'
        ];

    public static $default_lang_id = 1;

    static function get_user_bookings(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        if(Auth::user()->user_type == "doctor")
        {
            $results = booking_m::select(DB::raw("
            booking.*,
            doc_trans.full_name,
            doc_trans.job_title,
            doctors.price,
            doctors.rating,
            doctors.sessions_count,
            users.username,
            users.age,
            doctors_sessions.session_date,
            doctors_sessions.time_from,
            doctors_sessions.time_to,
            user_img.path as user_image_path,
            user_img.id as user_img_id


        "))
                ->join("users", function ($join) use($default_lang_id){
                    $join->on("users.user_id","=","booking.user_id")
                        ->whereNull("users.deleted_at");

                }) ->join("doctors_sessions", function ($join) use($default_lang_id){
                    $join->on("doctors_sessions.session_id","=","booking.session_id")
                        ->whereNull("doctors_sessions.deleted_at");

                })->join("doctors", function ($join) use($default_lang_id){
                    $join->on("doctors.doctor_id","=","doctors_sessions.doctor_id")
                        ->whereNull("doctors_sessions.deleted_at");

                })
                ->join("doctors_translate as doc_trans", function ($join) use($default_lang_id){
                    $join->on("doc_trans.doctor_id","=","doctors.doctor_id")
                        ->where("doc_trans.lang_id",$default_lang_id)
                        ->whereNull("doc_trans.deleted_at");

                })->leftJoin("attachments as user_img", function ($join){
                    $join->on("users.logo_id","=","user_img.id")
                        ->whereNull("user_img.deleted_at");

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

        }else{
            $results = booking_m::select(DB::raw("
            booking.*,
            doc_trans.full_name,
            doc_trans.job_title,
            doctors.price,
            doctors.rating,
            doctors.sessions_count,
            users.username,
            users.age,
            doctors_sessions.session_date,
            doctors_sessions.time_from,
            doctors_sessions.time_to,
            user_img.path as user_image_path,
            user_img.id as user_img_id


        "))
                ->join("doctors_sessions", function ($join) use($default_lang_id){
                    $join->on("doctors_sessions.session_id","=","booking.session_id")
                        ->whereNull("doctors_sessions.deleted_at");

                })->join("doctors", function ($join) use($default_lang_id){
                    $join->on("doctors.doctor_id","=","doctors_sessions.doctor_id")
                        ->whereNull("doctors_sessions.deleted_at");

                }) ->join("users", function ($join) use($default_lang_id){
                    $join->on("users.user_id","=","doctors.user_id")
                        ->whereNull("users.deleted_at");

                })
                ->join("doctors_translate as doc_trans", function ($join) use($default_lang_id){
                    $join->on("doc_trans.doctor_id","=","doctors.doctor_id")
                        ->where("doc_trans.lang_id",$default_lang_id)
                        ->whereNull("doc_trans.deleted_at");

                })->leftJoin("attachments as user_img", function ($join){
                    $join->on("users.logo_id","=","user_img.id")
                        ->whereNull("user_img.deleted_at");

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


    }

}
