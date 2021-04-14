<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class team_member_m extends Model
{
    use SoftDeletes;

    protected $table    = "team_member";
    protected $primaryKey   = "team_id";

    protected $dates    = ["deleted_at"];

    protected $fillable =
        [
            'name','title','img_id'
        ];

    static function get_team_member(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $results = team_member_m::select(DB::raw("
            team_member.*,
            user_img.path as user_image_path,
            user_img.id as user_img_id 
                       
            "))->leftJoin("attachments as user_img", function ($join){
            $join->on("team_member.img_id","=","user_img.id")
                ->whereNull("user_img.deleted_at");

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
