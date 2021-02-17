<?php

namespace App\models\payment_method;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class payment_method_m extends Model
{
    use SoftDeletes;

    protected $table           = "payment_method";

    protected $primaryKey      = "payment_method_id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
        'img_id','payment_type','payment_credentials','is_active'

        ];
    public static $default_lang_id =1;


    static function get_payment_methods(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = payment_method_m::select(DB::raw("
            payment_method.*,
            
            payment_trans.id as 'payment_transe_id',
            payment_trans.payment_method_name,
            payment_img.id as payment_img_id,
            payment_img.path as payment_image_path,
            payment_trans.lang_id
             
        "))
            ->join("payment_method_translate as payment_trans", function ($join) use($default_lang_id){
                $join->on("payment_trans.payment_method_id","=","payment_method.payment_method_id")
                    ->where("payment_trans.lang_id",$default_lang_id)
                    ->whereNull("payment_trans.deleted_at");

            })->leftJoin("attachments as payment_img", function ($join){
                $join->on("payment_method.img_id","=","payment_img.id")
                    ->whereNull("payment_img.deleted_at");
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
