<?php

namespace App\models\days;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class days_m extends Model
{
    use SoftDeletes;

    protected $table        = "days";

    protected $primaryKey   = "day_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'day_id', 'day_order'
    ];

    public static $default_lang_id = 1;

    static function get_days(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = days_m::select(DB::raw("
            days.*,
            
            day_trans.id as 'trans_id',
            day_trans.day_name,
            day_trans.lang_id
             
        "))
            ->join("days_translate as day_trans", function ($join) use($default_lang_id){
                $join->on("day_trans.day_id","=","days.day_id")
                    ->where("day_trans.lang_id",$default_lang_id)
                    ->whereNull("day_trans.deleted_at");
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
