<?php

namespace App\models\specialites;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class specialites_m extends Model
{
    use SoftDeletes;

    protected $table      = "specialites";

    protected $primaryKey = "spe_id";

    protected $dates      = ["deleted_at"];

    protected $fillable   =
    [
        'spe_id'
    ];

    public static $default_lang_id = 1;

    static function get_specialites(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');

        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = specialites_m::select(DB::raw("
            specialites.*,
            spec_trans.title,
            spec_trans.lang_id

        "))
            ->join("specialites_translate as spec_trans", function ($join) use($default_lang_id){
                $join->on("spec_trans.spe_id","=","specialites.spe_id")
                    ->where("spec_trans.lang_id",$default_lang_id)
                    ->whereNull("spec_trans.deleted_at");

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
