<?php

namespace App\models\brands;

use App\models\attachments_m;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class brand_m extends Model
{
    use SoftDeletes;

    protected $table           = "brands";

    protected $primaryKey      = "brand_id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'small_img_id','cover_img_id','cat_id','slider_ids','branches_count','brand_order','is_feature'

        ];
    public static $default_lang_id =1;


    static function get_brands(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no",
        $dashboard              = "true"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = brand_m::select(DB::raw("
            brands.*,
            
            brands_trans.id as 'brand_transe_id',
            brands_trans.brand_name,
            brand_img.id as brand_img_id,
            brand_img.path as brand_image_path,
            cover_img.id as cover_img_id,
            cover_img.path as cover_image_path,
            brands_trans.lang_id,
            category.color as cat_color,
            category_translate.cat_name
             
        "))
            ->join("brands_translate as brands_trans", function ($join) use($default_lang_id){
                $join->on("brands_trans.brand_id","=","brands.brand_id")
                    ->where("brands_trans.lang_id",$default_lang_id)
                    ->whereNull("brands_trans.deleted_at");

            })->join("category", function ($join) use($default_lang_id){
                $join->on("category.cat_id","=","brands.cat_id")
                    ->whereNull("category.deleted_at");

            })->join("category_translate", function ($join) use($default_lang_id){
                $join->on("category_translate.cat_id","=","category.cat_id")
                    ->where("category_translate.lang_id",$default_lang_id)
                    ->whereNull("category_translate.deleted_at");

            })->leftJoin("attachments as brand_img", function ($join){
                $join->on("brands.small_img_id","=","brand_img.id")
                    ->whereNull("brand_img.deleted_at");

            })->leftJoin("attachments as cover_img", function ($join){
                $join->on("brands.cover_img_id","=","cover_img.id")
                    ->whereNull("cover_img.deleted_at");
            });
        if($dashboard ==  'true')
        {
            $results->leftJoin("branches",function ($join){
               $join->on("brands.brand_id","=","branches.brand_id")
                   ->whereNull("branches.deleted_at");
            });
        }else{
            $results->join("branches",function ($join){
                $join->on("brands.brand_id","=","branches.brand_id")
                    ->whereNull("branches.deleted_at");
            });
        }
        $results = $results->groupBy('brands.brand_id');


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
            if (is_array($results->all()) && count($results->all()))
            {
                $results    = $results->first();

                //get slider data
                $slider_ids             = json_decode($results->slider_ids);
                $results->slider_imgs   = array();
                if (is_array($slider_ids) &&  count($slider_ids) > 0) {

                    $slider_imgs            = attachments_m::whereIn("id",$slider_ids)->get()->all();
                    $results->slider_imgs   = $slider_imgs;
                }

            }
            else{
                $results    = $results->first();
            }
        }

        return $results;

    }





}
