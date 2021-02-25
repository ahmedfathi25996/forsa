<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class wallet_history_m extends Model
{
    use SoftDeletes;

    protected $table    = "wallet_history";
    protected $primaryKey   = "wallet_id";

    protected $dates    = ["deleted_at"];

    protected $fillable =
        [
            'user_id','value','is_done','value_for'
        ];

    static function get_wallet_history(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = wallet_history_m::select(DB::raw("
            wallet_history.*,
            users.username,
            users.email
            
            "))->join("doctors", function ($join){
            $join->on("doctors.doctor_id","=","wallet_history.doctor_id")
                ->whereNull("doctors.deleted_at");

        })->join("users", function ($join){
                $join->on("doctors.user_id","=","users.user_id")
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

        if ($return_obj!="no")
        {
            $results    = $results->first();
        }

        return $results;

    }

}
