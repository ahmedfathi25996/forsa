<?php

namespace App\models\branches\offers;

use App\models\attachments_m;
use App\models\branches\branch_m;
use App\models\branches\branches_offers_m;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class offer_m extends Model
{
    use SoftDeletes;

    protected $table        = "offers";

    protected $primaryKey   = "offer_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
        [
            'brand_id','img_id','slider_ids','num_of_usage',
            'num_of_points','offer_type_id','max_offer_price','is_hot_offer','offer_allowed_to'

        ];

    public static $default_lang_id = 1;


    static function get_branches_offers(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = offer_m::select(DB::raw("
            offers.*,
            
            offers_translate.id as trans_id,
            offers_translate.offer_title,
            offers_translate.offer_description,
            offers_translate.lang_id,
            
            type_trans.offer_type_name,
            
            
            logo.path as logo_path,
            logo.title as logo_title,
            logo.alt as logo_alt,
            logo.id as logo_img_id
             
        "))
            ->join("offers_translate" ,function($join) use($default_lang_id){
                $join->on("offers_translate.offer_id","=","offers.offer_id")
                    ->where("offers_translate.lang_id",$default_lang_id)
                    ->whereNull("offers_translate.deleted_at");
            })


            ->join("offers_type", function ($join) use($default_lang_id){
                $join->on("offers_type.offer_type_id","=","offers.offer_type_id")
                    ->whereNull("offers_type.deleted_at");
            })
            ->join("offer_type_translate as type_trans", function ($join) use($default_lang_id){
                $join->on("type_trans.offer_type_id","=","offers_type.offer_type_id")
                    ->where("type_trans.lang_id",$default_lang_id)
                    ->whereNull("type_trans.deleted_at");
            })

            ->leftJoin("attachments as logo", function ($join){
                $join->on("offers.img_id","=","logo.id")
                    ->whereNull("logo.deleted_at");
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




    public static function brand_offer_api(
         $additional_and_wheres     = [],
         $limit                     = 0 ,
         $offset                    = 0,
         $paginate                  = 0,
         $free_conditions           = ""
    )
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;


        $offers = offer_m::select(
            "offers.*",
            "offers_translate.id as trans_id",
            "offers_translate.offer_title",
            "offers_translate.offer_description",
            "offers_translate.lang_id",
            "type_trans.offer_type_name",
            "branches_offers.expiration_date as offer_expire_date",
            "category.color as cat_color",
            "category.cat_id",
            "category_translate.cat_name as cat_name",
            "brands_translate.brand_name as brand_name",
            "logo.path as logo_path",
            "logo.title as logo_title",
            "logo.alt as logo_alt",
            "logo.id as logo_img_id",
            "brand_logo.path as brand_cover_path"

        )
            ->join("offers_translate" ,function($join) use($default_lang_id){
                $join->on("offers_translate.offer_id","=","offers.offer_id")
                    ->where("offers_translate.lang_id",$default_lang_id)
                    ->whereNull("offers_translate.deleted_at");
            })


            ->join("offers_type", function ($join) use($default_lang_id){
                $join->on("offers_type.offer_type_id","=","offers.offer_type_id")
                    ->whereNull("offers_type.deleted_at");
            })
            ->join("offer_type_translate as type_trans", function ($join) use($default_lang_id){
                $join->on("type_trans.offer_type_id","=","offers_type.offer_type_id")
                    ->where("type_trans.lang_id",$default_lang_id)
                    ->whereNull("type_trans.deleted_at");
            })
            ->join("brands", function ($join) use($default_lang_id){
                $join->on("offers.brand_id","=","brands.brand_id")
                    ->whereNull("brands.deleted_at");
            })
            ->join("brands_translate", function ($join) use($default_lang_id){
                $join->on("brands_translate.brand_id","=","brands.brand_id")
                    ->where("brands_translate.lang_id",$default_lang_id)
                    ->whereNull("brands_translate.deleted_at");
            })

            ->join("branches_offers", function ($join) use($default_lang_id){
                $join->on("branches_offers.offer_id","=","offers.offer_id")
                    ->whereNull("branches_offers.deleted_at");
            })
            ->join("category", function ($join) use($default_lang_id){
                $join->on("category.cat_id","=","brands.cat_id")
                    ->whereNull("category.deleted_at");

            })
            ->join("category_translate", function ($join) use($default_lang_id){
                $join->on("category_translate.cat_id","=","category.cat_id")
                    ->where("category_translate.lang_id",$default_lang_id)
                    ->whereNull("category_translate.deleted_at");

            }) ->join("branches", function ($join) use($default_lang_id){
                $join->on("branches.branch_id","=","branches_offers.branch_id")
                    ->whereNull("branches.deleted_at");

            })
            ->leftJoin("attachments as logo", function ($join){
                $join->on("offers.img_id","=","logo.id")
                    ->whereNull("logo.deleted_at");
            })
            ->leftJoin("attachments as brand_logo", function ($join){
            $join->on("brands.cover_img_id","=","brand_logo.id")
                ->whereNull("brand_logo.deleted_at");
    });

        $offers = $offers->where('branches_offers.expiration_date','>=',Carbon::now())
            ->groupBy('offers.offer_id');


        if (!empty($free_conditions))
        {
            $offers        = $offers->whereRaw($free_conditions);
        }


        if(is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $offers = $offers->where($additional_and_wheres);
        }


        if ($limit > 0)
        {
            return $offers= $offers->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
           return $offers= $offers->paginate($paginate);
        }
        else{
            $offers =  $offers->get();
        }

        return $offers;

    }



    public static function get_offer_branches_api($offer_id)
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;


        $branches = branches_offers_m::select("branches_offers.*","branches_translate.*","branches.*",
            "city_translate.city_name","district_translate.district_name"
        )->
        join('branches', function ($query){
            $query->on('branches.branch_id', '=', 'branches_offers.branch_id')
                ->whereNull('branches.deleted_at');
        })->
        join('branches_translate', function ($query) use ($default_lang_id){
            $query->on('branches_translate.branch_id', '=', 'branches.branch_id')
                ->whereNull('branches_translate.deleted_at')
                ->where('branches_translate.lang_id',$default_lang_id);
        })->
        join('city_translate', function ($query) use ($default_lang_id){
            $query->on('branches.city_id', '=', 'city_translate.city_id')
                ->whereNull('city_translate.deleted_at')
                ->where('city_translate.lang_id',$default_lang_id);

        })->

        join('district_translate', function ($query) use ($default_lang_id){
            $query->on('branches.district_id', '=', 'district_translate.district_id')
                ->whereNull('district_translate.deleted_at')
                ->where('district_translate.lang_id',$default_lang_id);
        })

          ->where("branches_offers.offer_id", $offer_id)->where('branches_offers.is_active',1);



        $branches = $branches->groupBy("branches.branch_id")->get();

        return $branches;

    }

     public static function get_offer_slider($offer)
    {

        if(is_object($offer))
        {
            $slider_ids = json_decode($offer->slider_ids);
            $offer->slider_ids = [];

            if (is_array($slider_ids)&&  count($slider_ids) >0) {

                $slider_ids = attachments_m::whereIn("id",$slider_ids)->get()->all();
                $offer->slider_ids = $slider_ids;
            }

        }

        return $offer;

    }



    public static function get_nearby_offers_api($cond = [],$lat,$lng,$limit = 0,$paginate = 0)
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;


        $offers = offer_m::select(
            "offers.*",
            "offers_translate.id as trans_id",
            "offers_translate.offer_title",
            "offers_translate.offer_description",
            "offers_translate.lang_id",
            "type_trans.offer_type_name",
            "branches_offers.expiration_date as offer_expire_date",
            "category.color as cat_color",
            "category_translate.cat_name as cat_name",
            "brands.*",
            "brands_translate.brand_name as brand_name",
            "logo.path as logo_path",
            "logo.title as logo_title",
            "logo.alt as logo_alt",
            "logo.id as logo_img_id"
        )
            ->join("offers_translate" ,function($join) use($default_lang_id){
                $join->on("offers_translate.offer_id","=","offers.offer_id")
                    ->where("offers_translate.lang_id",$default_lang_id)
                    ->whereNull("offers_translate.deleted_at");
            })


            ->join("offers_type", function ($join) use($default_lang_id){
                $join->on("offers_type.offer_type_id","=","offers.offer_type_id")
                    ->whereNull("offers_type.deleted_at");
            })
            ->join("offer_type_translate as type_trans", function ($join) use($default_lang_id){
                $join->on("type_trans.offer_type_id","=","offers_type.offer_type_id")
                    ->where("type_trans.lang_id",$default_lang_id)
                    ->whereNull("type_trans.deleted_at");
            })
            ->join("brands", function ($join) use($default_lang_id){
                $join->on("offers.brand_id","=","brands.brand_id")
                    ->whereNull("brands.deleted_at");
            })
            ->join("brands_translate", function ($join) use($default_lang_id){
                $join->on("brands_translate.brand_id","=","brands.brand_id")
                    ->where("brands_translate.lang_id",$default_lang_id)
                    ->whereNull("brands_translate.deleted_at");
            })

            ->join("branches_offers", function ($join) use($default_lang_id){
                $join->on("branches_offers.offer_id","=","offers.offer_id")
                    ->whereNull("branches_offers.deleted_at");
            })
            ->join("category", function ($join) use($default_lang_id){
                $join->on("category.cat_id","=","brands.cat_id")
                    ->whereNull("category.deleted_at");

            })
            ->join("category_translate", function ($join) use($default_lang_id){
                $join->on("category_translate.cat_id","=","category.cat_id")
                    ->where("category_translate.lang_id",$default_lang_id)
                    ->whereNull("category_translate.deleted_at");

            }) ->join("branches", function ($join) use($default_lang_id){
                $join->on("branches.branch_id","=","branches_offers.branch_id")
                    ->whereNull("branches.deleted_at");

            })
            ->leftJoin("attachments as logo", function ($join){
                $join->on("offers.img_id","=","logo.id")
                    ->whereNull("logo.deleted_at");
            });


        $branches = branch_m::select("branches.*")->selectRaw("( 6371 * acos( cos( radians(" .$lat. ") ) * cos( radians( branches.map_lat ) ) * cos( radians( branches.map_lng ) - radians(" .$lng. ") ) + sin( radians(".$lat.") ) * sin( radians( branches.map_lat ) ) ) ) AS distance ")->
        havingRaw(" distance < 10")->pluck('branches.branch_id');

       $offers =  $offers->whereIn('branches.branch_id',$branches)
            ->where('branches_offers.expiration_date','>=',Carbon::now())->groupBy("offers.offer_id");


        if(is_array($cond) && count($cond))
        {
            $offers = $offers->where($cond);
        }

        if ($limit > 0)
        {
            $offers= $offers->limit($limit)->offset(0)->get();
        }
        else if ($paginate > 0)
        {
            $offers= $offers->paginate($paginate);
        }else{
            $offers =$offers->get();
        }
       return $offers;


    }


    public static function get_offer($offer_id)
    {
        $offer = offer_m::where('offer_id',$offer_id)->first();
        return $offer;
    }






}