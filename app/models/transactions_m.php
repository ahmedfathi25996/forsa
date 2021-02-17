<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class transactions_m extends Model
{
    use SoftDeletes;

    protected $table        = "transactions";
    protected $primaryKey   = "transaction_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'transaction_id','user_id', 'order_id','payment_method_id',
        'amount', 'request_json', 'response_json','payment_id' ,'description'
    ];

    public static $default_lang_id = 1;

    static function get_transactions(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;


        $results = transactions_m::select(DB::raw("
            transactions.*,
            payment_method.payment_type,
            payment_method_translate.payment_method_name,
            users.full_name
            
            "))
            ->join("payment_method", function ($join){
                $join->on("transactions.payment_method_id","=","payment_method.payment_method_id")
                    ->whereNull("payment_method.deleted_at");
            })

            ->join("payment_method_translate", function ($join) use($default_lang_id){
                $join->on("transactions.payment_method_id","=","payment_method_translate.payment_method_id")
                    ->where("payment_method_translate.lang_id",$default_lang_id)
                    ->whereNull("payment_method_translate.deleted_at");
            })

            ->join("users", function ($join){
                $join->on("transactions.user_id","=","users.user_id")
                    ->whereNull("users.deleted_at");
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
