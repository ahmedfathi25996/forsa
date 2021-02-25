<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class wallet_transactions_m extends Model
{
    use SoftDeletes;

    protected $table    = "wallet_transactions";
    protected $primaryKey   = "wallet_trans_id";

    protected $dates    = ["deleted_at"];

    protected $fillable =
        [
            'doctor_id','value','from_date','to_date','img_id','value_for'
        ];

    static function get_wallet_transactions(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = wallet_transactions_m::select(DB::raw("
            wallet_transactions.*,
            users.user_wallet,
            wallet_img.id as wallet_img_id,
            wallet_img.path as wallet_image_path
            
            "))->join("doctors", function ($join){
            $join->on("doctors.doctor_id","=","wallet_transactions.doctor_id")
                ->whereNull("doctors.deleted_at");

        })->join("users", function ($join){
            $join->on("doctors.user_id","=","users.user_id")
                ->whereNull("users.deleted_at");

        })->leftJoin("attachments as wallet_img", function ($join){
            $join->on("wallet_transactions.img_id","=","wallet_img.id")
                ->whereNull("wallet_img.deleted_at");
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
