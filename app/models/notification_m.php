<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class notification_m extends Model
{

    protected $table        = "notifications";
    protected $primaryKey   = "not_id";
    public $timestamps      = true;

    protected $fillable     =
    [
        'from_user_id', 'to_user_type', 'to_user_id','not_type','target_id',
        'not_title','not_priority','is_seen'
    ];

    static function get_notifications(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = notification_m::select(DB::raw("
            notifications.*,
            date(created_at) as notification_date
            
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

        if ($return_obj != "no")
        {
            $results    = $results->first();
        }

        return $results;

    }

    static function get_notifications_count()
    {

        $notifications = DB::select("SELECT not_type, count(*) as count_notifications
                    FROM `notifications` 
                    GROUP BY not_type");
        return $notifications;

    }

}
