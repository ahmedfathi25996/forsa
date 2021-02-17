<?php

namespace App\models\category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class category_m extends Model
{
    use SoftDeletes;

    protected $table = "category";

    protected $primaryKey = "cat_id";

    protected $dates = ["deleted_at"];

    protected $fillable = [
        'big_img_id', 'small_img_id',
        'cat_type', 'parent_id',
        'cat_order', 'hide_cat',
        'show_in_homepage','color'
    ];

    public static $default_lang_id=1;

    static function get_all_cats($additional_where = "", $order_by = "" , $limit = "",$make_it_hierarchical=false,$default_lang_id=1)
    {

        $cats = DB::select("

            SELECT cat.*,cat_translate.*,
            
            small_img.path as 'small_img_path' ,
            small_img.alt as 'small_img_alt' ,
            small_img.id as 'cat_img_id' ,
            small_img.title as 'small_img_title',
    
            ifnull(parent_cat_trans.cat_id ,0) as 'parent_cat_id',
            ifnull(parent_cat_trans.cat_name ,0) as 'parent_cat_name',
            ifnull(parent_cat_trans.cat_slug ,0) as 'parent_cat_slug'
            
            FROM `category` as cat

            inner join category_translate as cat_translate on (cat.cat_id=cat_translate.cat_id AND cat_translate.lang_id=$default_lang_id AND cat_translate.deleted_at is NULL)


            LEFT OUTER JOIN category as parent_cat on (cat.parent_id = parent_cat.cat_id AND parent_cat.deleted_at is NULL)
            LEFT OUTER join category_translate as parent_cat_trans on (parent_cat.cat_id = parent_cat_trans.cat_id and parent_cat_trans.lang_id = $default_lang_id AND parent_cat_trans.deleted_at is NULL)

            left outer join attachments as small_img on small_img.id=cat.small_img_id
    

            #where
            where cat.deleted_at is null $additional_where

            #order by
            $order_by

            #limit
            $limit "
        );



        $hierarchical_arr=array();
        if ($make_it_hierarchical==true) {
            foreach ($cats as $key => $cat) {

                if ($cat->parent_id>0) {
                    $hierarchical_arr[$cat->parent_cat_id]["level_data"]=array(
                        "item_id"=>$cat->parent_cat_id,
                        "item_name"=>$cat->parent_cat_name,
                        "item_slug"=>$cat->parent_cat_slug
                    );


                    $hierarchical_arr[$cat->parent_cat_id]["level_childs"][$cat->cat_id]["level_data"]=array(
                        "item_id"=>$cat->cat_id,
                        "item_name"=>$cat->cat_name,
                        "item_slug"=>$cat->parent_cat_slug."/".$cat->cat_slug
                    );
                }
            }

            return $hierarchical_arr;
        }


        return $cats;

    }


    static function get_api_cats($additional_where = "", $order_by = "" , $limit = "")
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $cats = DB::select("

            SELECT 
              
              cat.cat_id,
              cat.cat_type,
              cat.color,
              cat_translate.cat_name,
              small_img.path as 'cat_img'
            
            FROM `category` as cat

            inner join category_translate as cat_translate on (cat.cat_id=cat_translate.cat_id AND cat_translate.lang_id=$default_lang_id AND cat_translate.deleted_at is NULL)

            left outer join attachments as small_img on small_img.id=cat.small_img_id

            #where
            where cat.deleted_at is null $additional_where

            #order by
            $order_by

            #limit
            $limit "
        );


        return $cats;

    }


    public function cat_big_img()
    {
        return $this->hasOne('App\models\attachments_m',"id","big_img_id");
    }

    public function cat_small_img()
    {
        return $this->hasOne('App\models\attachments_m',"id","small_img_id");
    }



}
