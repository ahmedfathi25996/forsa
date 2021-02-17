<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class support_messages_m extends Model
{
    use SoftDeletes;

    protected $table    = "support_messages";

    protected $dates    = ["deleted_at"];

    protected $fillable =
    [
        'user_id','msg_type','full_name','phone',
        'email', 'message','is_seen', 'ip_address',
        'country' ,'timezone', 'UDID', 'device_type',
        'device_name','os_version','app_version'
    ];

    static function get_support_messages(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = support_messages_m::select(DB::raw("
            support_messages.*
            
            "));

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

        if ($return_obj!="no")
        {
            $results    = $results->first();
        }

        return $results;

    }

}
