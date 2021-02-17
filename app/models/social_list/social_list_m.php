<?php

namespace App\models\social_list;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class social_list_m extends Model
{
    use SoftDeletes;

    protected $table      = "social_list";

    protected $primaryKey = "social_list_id";

    protected $dates      = ["deleted_at"];

    protected $fillable   =
    [
        'img_id', 'social_url','social_order'
    ];

    public static $default_lang_id = 1;

    static function get_social_pages(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = social_list_m::select(DB::raw("
            social_list.*,
            
            social_trans.id as 'social_transe_id',
            social_trans.name,
            social_img.path as social_image_path,
            social_img.id as social_img_id,
            social_trans.lang_id
             
        "))
            ->join("social_list_translate as social_trans", function ($join) use($default_lang_id){
                $join->on("social_trans.social_list_id","=","social_list.social_list_id")
                    ->where("social_trans.lang_id",$default_lang_id)
                    ->whereNull("social_trans.deleted_at");

            })->leftJoin("attachments as social_img", function ($join){
                $join->on("social_list.img_id","=","social_img.id")
                    ->whereNull("social_img.deleted_at");
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
