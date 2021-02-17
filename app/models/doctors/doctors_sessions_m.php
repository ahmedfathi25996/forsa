<?php

namespace App\models\doctors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class doctors_sessions_m extends Model
{
    use SoftDeletes;

    protected $table      = "doctors_sessions";

    protected $primaryKey = "session_id";

    protected $fillable   =
        [
            'doctor_id', 'session_date','time_from','time_to','is_booked','is_done','is_verified_by_admin'
        ];

    protected $dates      = ["deleted_at"];
    public static $default_lang_id = 1;

    static function get_doctors_sessions(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = doctors_sessions_m::select(DB::raw("
            doctors_sessions.*


        "))
            ->join("doctors", function ($join) use($default_lang_id){
                $join->on("doctors.doctor_id","=","doctors_sessions.doctor_id")
                    ->whereNull("doctors.deleted_at");

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
