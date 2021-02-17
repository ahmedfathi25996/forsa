<?php

namespace App\models\city;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class city_list_m extends Model
{
    use SoftDeletes;

    protected $table        = "city_list";

    protected $primaryKey   = "city_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        "city_id", "map_lat", "map_lng"
    ];

    public static $default_lang_id = 1;


    static function get_cities(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = city_list_m::select(DB::raw("
            city_list.*,
            
            city_trans.id as 'trans_id',
            city_trans.city_name,
            city_trans.lang_id
             
        "))
            ->join("city_translate as city_trans", function ($join) use($default_lang_id){
                $join->on("city_trans.city_id","=","city_list.city_id")
                    ->where("city_trans.lang_id",$default_lang_id)
                    ->whereNull("city_trans.deleted_at");
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
