<?php

namespace App\models\district;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class district_list_m extends Model
{
    use SoftDeletes;

    protected $table        = "district_list";

    protected $primaryKey   = "district_id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        "city_id", "map_lat", "map_lng"
    ];

    public static $default_lang_id = 1;


    static function get_districts(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0 , $return_obj       = "no"
    )
    {

        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = district_list_m::select(DB::raw("
            district_list.*,
            
            city_trans.city_name,
            
            district_trans.id as 'trans_id',
            district_trans.district_name,
            district_trans.lang_id
             
        "))
            ->join("district_translate as district_trans", function ($join) use($default_lang_id){
                $join->on("district_trans.district_id","=","district_list.district_id")
                    ->where("district_trans.lang_id",$default_lang_id)
                    ->whereNull("district_trans.deleted_at");
            })
            ->join("city_list", function ($join) use($default_lang_id){
                $join->on("city_list.city_id","=","district_list.city_id")
                    ->whereNull("city_list.deleted_at");
            })
            ->join("city_translate as city_trans", function ($join) use($default_lang_id){
                $join->on("city_trans.city_id","=","city_list.city_id")
                    ->where("city_trans.lang_id",$default_lang_id)
                    ->whereNull("city_trans.deleted_at");
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


    static function citiesDistricts()
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $data = DB::table("district_list")->select("district_list.district_id","district_list.city_id",'district_list_trans.district_name','city_list_trans.city_name')->
        join('district_translate as district_list_trans', function ($query) use ($default_lang_id){
            $query->on('district_list.district_id', '=', 'district_list_trans.district_id')->whereNull('district_list.deleted_at')
                ->where('district_list_trans.lang_id',$default_lang_id);
        })->
        join("city_list as city_object",'district_list.city_id','city_object.city_id')->
        join('city_translate as city_list_trans', function ($query) use ($default_lang_id){
            $query->on('city_object.city_id', '=', 'city_list_trans.city_id')->whereNull('city_object.deleted_at')
                ->where('city_list_trans.lang_id',$default_lang_id);
        })->get()->groupBy('city_id');
        return $data;
    }




}
