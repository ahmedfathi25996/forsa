<?php

namespace App\models\doctors\certificates;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class certificates_m extends Model
{
    use SoftDeletes;

    protected $table      = "doctors_certificates";

    protected $primaryKey = "cer_id";

    protected $dates      = ["deleted_at"];

    protected $fillable   =
        [
            'cer_id','doctor_id'
        ];

    public static $default_lang_id = 1;

    static function get_doctors_certificates(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = certificates_m::select(DB::raw("
            doctors_certificates.*,
            cer_trans.title,
            cer_trans.lang_id

        "))
            ->join("doctors_certificates_translate as cer_trans", function ($join) use($default_lang_id){
                $join->on("cer_trans.cer_id","=","doctors_certificates.cer_id")
                    ->where("cer_trans.lang_id",$default_lang_id)
                    ->whereNull("cer_trans.deleted_at");

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
