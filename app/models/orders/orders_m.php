<?php

namespace App\models\orders;

use App\models\branches\branches_offers_m;
use App\models\branches\offers\offer_m;
use App\models\plans\plan_m;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class orders_m extends Model
{
    use SoftDeletes;

    protected $table        = "orders";

    protected $primaryKey   = "order_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'user_id', 'branch_id', 'offer_id', 'money_used_from_wallet'
    ];

    public static $default_lang_id = 1;


    static function get_orders(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = orders_m::select(DB::raw("
            orders.*,
           
            user_obj.full_name,
            offers_translate.offer_title,
            type_trans.offer_type_name,
            branches_translate.branch_name,
            orders.created_at as order_date,
            logo.path as logo_path,
            logo.title as logo_title
          
              "))

            ->join("users as user_obj", function ($join){
                $join->on("orders.user_id","=","user_obj.user_id")
                    ->whereNull("user_obj.deleted_at");
            })

            ->join("offers", function ($join){
                $join->on("orders.offer_id","=","offers.offer_id")
                    ->whereNull("offers.deleted_at");
            })

            ->join("offers_translate", function ($join) use($default_lang_id){
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
            ->join("branches", function ($join){
                $join->on("orders.branch_id","=","branches.branch_id")
                    ->whereNull("branches.deleted_at");
            })

            ->join("branches_translate", function ($join) use($default_lang_id){
                $join->on("branches_translate.branch_id","=","branches.branch_id")
                    ->where("branches_translate.lang_id",$default_lang_id)
                    ->whereNull("branches_translate.deleted_at");
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
