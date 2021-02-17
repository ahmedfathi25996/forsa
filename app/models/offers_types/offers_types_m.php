<?php

namespace App\models\offers_types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class offers_types_m extends Model
{
    use SoftDeletes;

    protected $table           = "offers_type";

    protected $primaryKey      = "offer_type_id";

    protected $dates           = ["deleted_at"];
    public $fillable           =
        [
            'offer_type_id'

        ];


    public static $default_lang_id =1;


    static function get_offers_types(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = offers_types_m::select(DB::raw("
            offers_type.*,
            
            type_trans.id as 'type_transe_id',
            type_trans.offer_type_name,
            type_trans.lang_id
             
        "))
            ->join("offer_type_translate as type_trans", function ($join) use($default_lang_id){
                $join->on("type_trans.offer_type_id","=","offers_type.offer_type_id")
                    ->where("type_trans.lang_id",$default_lang_id)
                    ->whereNull("type_trans.deleted_at");

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
