<?php

namespace App\models\branches;

use App\models\attachments_m;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class branch_m extends Model
{
    use SoftDeletes;

    protected $table        = "branches";

    protected $primaryKey   = "branch_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
        [
            'user_id','brand_id','logo_id', 'cover_id', 'city_id' ,'district_id',
            'map_lat', 'map_lng', 'phone_number', 'is_active'
        ];

    public static $default_lang_id = 1;


    static function get_branches(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = branch_m::select(DB::raw("
            branches.*,
            
            branch_trans.id as trans_id,
            branch_trans.branch_name,
            branch_trans.branch_description,
            branch_trans.lang_id,
            
            city_trans.city_name,
            district_trans.district_name,
            
            users.full_name,
            users.email,
            
            
            logo.path as logo_path,
            logo.title as logo_title,
            logo.alt as logo_alt,
            logo.id as logo_img_id,

            
            cover.path as cover_path,
            cover.title as cover_title,
            cover.alt as cover_alt,
            cover.id as cover_img_id
             
        "))
            ->join("branches_translate as branch_trans", function ($join) use($default_lang_id){
                $join->on("branch_trans.branch_id","=","branches.branch_id")
                    ->where("branch_trans.lang_id",$default_lang_id)
                    ->whereNull("branch_trans.deleted_at");
            })

            ->join("city_list", function ($join) use($default_lang_id){
                $join->on("city_list.city_id","=","branches.city_id")
                    ->whereNull("city_list.deleted_at");
            })
            ->join("city_translate as city_trans", function ($join) use($default_lang_id){
                $join->on("city_trans.city_id","=","city_list.city_id")
                    ->where("city_trans.lang_id",$default_lang_id)
                    ->whereNull("city_trans.deleted_at");
            })

            ->join("district_list", function ($join) use($default_lang_id){
                $join->on("district_list.district_id","=","branches.district_id")
                    ->whereNull("district_list.deleted_at");
            })
            ->join("district_translate as district_trans", function ($join) use($default_lang_id){
                $join->on("district_trans.district_id","=","district_list.district_id")
                    ->where("district_trans.lang_id",$default_lang_id)
                    ->whereNull("district_trans.deleted_at");
            })
            ->leftJoin("users", function ($join) use($default_lang_id){
                $join->on("users.user_id","=","branches.user_id")
                    ->whereNull("users.deleted_at");
            })

            ->leftJoin("attachments as logo", function ($join){
                $join->on("branches.logo_id","=","logo.id")
                    ->whereNull("logo.deleted_at");
            })

            ->leftJoin("attachments as cover", function ($join){
                $join->on("branches.cover_id","=","cover.id")
                    ->whereNull("cover.deleted_at");
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
