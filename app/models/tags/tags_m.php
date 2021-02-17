<?php

namespace App\models\tags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class tags_m extends Model
{
    use SoftDeletes;

    protected $table        = "tags";

    protected $primaryKey   = "tag_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        "tag_id"
    ];

    public static $default_lang_id = 1;


    static function get_tags(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {


        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;


        $results = tags_m::select(DB::raw("
            tags.*,
            
            tags_trans.id as 'trans_id',
            tags_trans.tag_name,
            tags_trans.lang_id
             
        "))
            ->join("tags_translate as tags_trans", function ($join) use($default_lang_id){
                $join->on("tags_trans.tag_id","=","tags.tag_id")
                    ->where("tags_trans.lang_id",$default_lang_id)
                    ->whereNull("tags_trans.deleted_at");
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
