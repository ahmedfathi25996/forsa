<?php

namespace App\models\branches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class branches_offers_m extends Model
{
    use SoftDeletes;

    protected $table        = "branches_offers";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
        [
            'branch_id', 'offer_id','expiration_date','is_active'
        ];
    public static $default_lang_id = 1;

    public static function get_offer($offer_id,$branch_id)
    {
        $offer = branches_offers_m::where('offer_id',$offer_id)
            ->where('branch_id',$branch_id)
            ->where('is_active',1)->first();
        return $offer;
    }



    static function get_offers(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = branches_offers_m::select(DB::raw("
            branches_offers.*,
            branches_offers.expiration_date as offer_expire_date,
            offers.*,
            branches_offers.id as branch_offer_id,
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
            ->join("offers" ,function($join) use($default_lang_id){
                $join->on("branches_offers.offer_id","=","offers.offer_id")
                    ->whereNull("offers.deleted_at");
            })
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
            $results    = $results->first();
        }

        return $results;

    }

}
