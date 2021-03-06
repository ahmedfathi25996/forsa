<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class langs_m extends Model
{

    use SoftDeletes;

    protected $table        = "langs";

    protected $primaryKey   = "lang_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'lang_symbole',"lang_text","lang_img_id","lang_direction"
    ];

    static function get_langs(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = langs_m::select(DB::raw("
            langs.*,
            
            lang_img.path as lang_img_path,
            lang_img.title as lang_img_title,
            lang_img.alt as lang_img_alt
             
        "))
            ->leftJoin("attachments as lang_img", function ($join){
                $join->on("langs.lang_img_id","=","lang_img.id")
                    ->whereNull("lang_img.deleted_at");
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
