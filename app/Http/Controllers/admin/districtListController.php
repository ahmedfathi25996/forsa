<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\city\city_list_m;
use App\models\district\district_list_m;
use App\models\district\district_translate_m;
use App\models\regions\regions_list_m;
use App\models\regions\regions_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class districtListController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الأحياء");

            return $next($request);
        });

    }

    public function index($city_id = null)
    {

        $cond           = [];
        if($city_id != null)
        {
            $cond[]     = ["district_list.city_id","=",$city_id];
        }

        $this->data["results"] = district_list_m::get_districts(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "district_list.district_id",
            $order_by_type          = "desc"
        );

        return view("admin.subviews.districtList.show", $this->data);
    }

    public function save(Request $request, $district_id = null)
    {

        $this->getAllLangs();

        #region get cities

        $this->data["cities"] = city_list_m::get_cities(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "city_list.city_id",
            $order_by_type          = "desc"
        );

        if(!is_array($this->data["cities"]->all()) || !count($this->data["cities"]->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد مدن حاليا أضف أولا !!</div>";
            return Redirect::to("admin/cityList/save/")->with([
                "msg" => $this->data["success"]
            ])->send();
        }

        #endregion

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($district_id != null)
        {

            $district_id    = intval(clean($district_id));

            $cond       = [];
            $cond[]     = ["district_list.district_id","=",$district_id];
            $item_data  = district_list_m::get_districts(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = district_translate_m::where("district_id",$district_id)->get();

        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if(count($validator->messages()) == 0 && empty($this->data["success"]))
            {

                $input_data = $request->all();

                // update
                if ($district_id != null)
                {

                    $check = district_list_m::find($district_id)->update(clean($request->all()));

                    if ($check == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/districtList/save/$district_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                else{

                    // insert
                    $check = district_list_m::create(clean($request->all()));

                    if (is_object($check))
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/districtList/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $district_id = $check->district_id;

                }

                #region save translate data


                foreach($this->data["all_langs"] as $lang_key => $lang_item)
                {
                    $inputs                     = [];
                    $inputs["district_id"]      = $district_id;
                    $inputs["district_name"]    = clean(array_shift($input_data["district_name"]));
                    $inputs["lang_id"]          = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id)
                        {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first()))
                    {
                        // edit
                        district_translate_m::where("id",$current_row->first()->id)->update($inputs);
                    }
                    else{
                        // new
                        district_translate_m::create($inputs);
                    }

                }


                #endregion


                return Redirect::to("admin/districtList/save/$district_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/districtList/save/$district_id")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }

        return view("admin.subviews.districtList.save",$this->data);
    }


    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        #region rules and values

        $rules_values["map_lat"]                       = clean($request->get("map_lat"));
        $rules_itself["map_lat"]                       = "required";

        $rules_values["map_lng"]                       = clean($request->get("map_lng"));
        $rules_itself["map_lng"]                       = "required";

        #endregion

        #region rules attributes names

        $attrs_names["map_lat.required"]               = "إحداثي خط العرض مطلوب إدخالة";
        $attrs_names["map_lng.required"]               = "إحداثي خط الطول مطلوب إدخالة";

        #endregion

        $district_names         = $request->get("district_name");

        foreach($all_langs as $key => $lang_item)
        {

            $current_district = array_shift($district_names);
            if (in_array($current_district, $district_names) && !empty($current_district))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم الحي</div>";
                break;
            }

            $current_row = $translate_rows->filter(function ($value, $key) use($lang_item) {
                if ($value->lang_id == $lang_item->lang_id)
                {
                    return $value;
                }
            });

            $translate_row_id       = null;
            if(is_object($current_row->first())){
                $translate_row_id   = $current_row->first()->id;
            }

            $rules_values["district_name_$key"]             = clean($request->get("district_name")[$key]);
            $rules_itself["district_name_$key"]             = "required|unique:district_translate,district_name,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["district_name_$key.required"]     = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["district_name_$key.unique"]       = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        #region remove dependencies

            // remove translate
            district_translate_m::where("district_id",$item_id)->delete();

            // remove regions
            $regions_ids = regions_list_m::where("district_id",$item_id)->pluck("region_id")->all();
            if(is_array($regions_ids) && count($regions_ids))
            {
                regions_list_m::whereIn("region_id",$regions_ids)->delete();
                regions_translate_m::whereIn("region_id",$regions_ids)->delete();
            }

        #endregion

        $this->general_remove_item($request,'App\models\district\district_list_m');
    }


}
