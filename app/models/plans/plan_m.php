<?php

namespace App\models\plans;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class plan_m extends Model
{
    use SoftDeletes;

    protected $table           = "plans";

    protected $primaryKey      = "plan_id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'img_id','price','num_of_days','offers_number','is_basic_plan','is_active'

        ];

    protected $casts        =
        [
            'price'       => 'float',
        ];
    public static $default_lang_id =1;


    static function get_plans(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = plan_m::select(DB::raw("
            plans.*,
            
            plans_trans.id as 'plan_transe_id',
            plans_trans.plan_name,
            plans_trans.plan_description,
            plans_trans.plan_type,
            plan_img.id as plan_img_id,
            plan_img.path as plan_image_path,
            plans_trans.lang_id
             
        "))
            ->join("plans_translate as plans_trans", function ($join) use($default_lang_id){
                $join->on("plans_trans.plan_id","=","plans.plan_id")
                    ->where("plans_trans.lang_id",$default_lang_id)
                    ->whereNull("plans_trans.deleted_at");

            })->leftJoin("attachments as plan_img", function ($join){
                $join->on("plans.img_id","=","plan_img.id")
                    ->whereNull("plan_img.deleted_at");
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

    public static function get_plan($plan_id)
    {
        return plan_m::where('plan_id',$plan_id)->where('is_active',1)->first();
    }


}
