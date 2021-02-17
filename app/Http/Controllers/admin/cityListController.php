<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\city\city_list_m;
use App\models\city\city_translate_m;
use App\models\district\district_list_m;
use App\models\district\district_translate_m;
use App\models\regions\regions_list_m;
use App\models\regions\regions_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class cityListController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("المدن");

            return $next($request);
        });

    }

    public function index()
    {

        $this->data["results"] = city_list_m::get_cities(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "city_list.city_id",
            $order_by_type          = "desc"
        );

        return view("admin.subviews.cityList.show", $this->data);
    }

    public function save(Request $request, $city_id = null)
    {

        $this->getAllLangs();

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($city_id != null)
        {

            $city_id    = intval(clean($city_id));

            $cond       = [];
            $cond[]     = ["city_list.city_id","=",$city_id];
            $item_data  = city_list_m::get_cities(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = city_translate_m::where("city_id",$city_id)->get();

        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if(count($validator->messages()) == 0 && empty($this->data["success"]))
            {

                $input_data = $request->all();

                // update
                if ($city_id != null)
                {

                    $check = city_list_m::find($city_id)->update(clean($request->all()));

                    if ($check == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to('admin/cityList/save/'.$city_id)->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                else{

                    // insert
                    $check = city_list_m::create(clean($request->all()));

                    if (is_object($check))
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to('admin/cityList/save/')->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $city_id = $check->city_id;

                }

                #region save translate data


                foreach($this->data["all_langs"] as $lang_key => $lang_item)
                {
                    $inputs                 = [];
                    $inputs["city_id"]      = $city_id;
                    $inputs["city_name"]    = clean(array_shift($input_data["city_name"]));
                    $inputs["lang_id"]      = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id)
                        {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first()))
                    {
                        // edit
                        city_translate_m::where("id",$current_row->first()->id)->update($inputs);
                    }
                    else{
                        // new
                        city_translate_m::create($inputs);
                    }

                }

                #endregion

                return Redirect::to("admin/cityList/save/$city_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/cityList/save/$city_id")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }


        return view("admin.subviews.cityList.save",$this->data);
    }


    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $city_names             = $request->get("city_name");

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

        foreach($all_langs as $key => $lang_item)
        {

            $current_city = array_shift($city_names);
            if (in_array($current_city, $city_names) && !empty($current_city))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم المدينة</div>";
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

            $rules_values["city_name_$key"]              = clean($request->get("city_name")[$key]);
            $rules_itself["city_name_$key"]              = "required|unique:city_translate,city_name,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["city_name_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["city_name_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        #region remove dependencies

            // remove translate
            city_translate_m::where("city_id",$item_id)->delete();

            // remove districts
            $district_ids = district_list_m::where("city_id", $item_id)->pluck("district_id")->all();
            if(is_array($district_ids) && count($district_ids))
            {

                district_list_m::where("city_id", $item_id)->delete();
                district_translate_m::whereIn("district_id", $district_ids)->delete();

                // remove regions
                $regions_ids = regions_list_m::whereIn("district_id",$district_ids)->pluck("region_id")->all();
                if(is_array($regions_ids) && count($regions_ids))
                {
                    regions_list_m::whereIn("region_id",$regions_ids)->delete();
                    regions_translate_m::whereIn("region_id",$regions_ids)->delete();
                }

            }

        #endregion

        $this->general_remove_item($request,'App\models\city\city_list_m');
    }


}
