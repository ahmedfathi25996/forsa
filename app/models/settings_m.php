<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class settings_m extends Model
{

    use SoftDeletes;

    protected $table        = "settings";
    protected $primaryKey   = "settings_id";

    protected $fillable     =
    [
        'setting_group', 'setting_key', 'setting_type', 'setting_value'
    ];


    static function get_settings(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = settings_m::select(DB::raw("
            settings.*,
            
            attach_file.path as attach_file_path,
            attach_file.title as attach_file_title,
            attach_file.alt as attach_file_alt
             
        "))
            ->leftJoin("attachments as attach_file", function ($join){
                $join->on("settings.setting_value","=","attach_file.id")
                    ->whereIn("settings.setting_type",["image","file"])
                    ->whereNull("attach_file.deleted_at");
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
