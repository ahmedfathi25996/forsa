<?php

namespace App\models\pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class pages_m extends Model
{
    use SoftDeletes;

    protected $table        = "pages";

    protected $primaryKey   = "page_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'small_img_id', 'big_img_id', 'page_slider',
        'page_type', 'hide_page', 'page_order'
    ];

    public static $default_lang_id = 2;

    static function get_pages(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = pages_m::select(DB::raw("
            pages.*,
            
            page_trans.id as 'page_transe_id',
            page_trans.page_title,
            page_trans.page_slug,
            page_trans.page_body,
            page_img.path as small_image_path,
            page_img.id as page_img_id,
            page_trans.lang_id
             
        "))
            ->join("pages_translate as page_trans", function ($join) use($default_lang_id){
                $join->on("page_trans.page_id","=","pages.page_id")
                    ->where("page_trans.lang_id",$default_lang_id)
                    ->whereNull("page_trans.deleted_at");

            })->leftJoin("attachments as page_img", function ($join){
                $join->on("pages.small_img_id","=","page_img.id")
                    ->whereNull("page_img.deleted_at");
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
