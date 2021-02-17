<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\days\days_m;
use App\models\days\days_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class daysController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الدول");

            return $next($request);
        });

    }

    public function index()
    {

        $this->data["results"] = days_m::get_days(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "days.day_order",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.days.show", $this->data);
    }

    public function save(Request $request, $day_id = null)
    {

        $this->getAllLangs();

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($day_id != null)
        {

            $day_id    = intval(clean($day_id));

            $cond       = [];
            $cond[]     = ["days.day_id","=",$day_id];
            $item_data  = days_m::get_days(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = days_translate_m::where("day_id",$day_id)->get();

        }


        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $input_data = $request->all();

                // update
                if ($day_id != null) {

                    $check = days_m::find($day_id)->update(clean($request->all()));

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/days/save/$day_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $check = days_m::create(clean($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/days/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $day_id = $check->day_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["day_id"]   = $day_id;
                    $inputs["day_name"] = clean(array_shift($input_data["day_name"]));
                    $inputs["lang_id"]  = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        days_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        days_translate_m::create($inputs);
                    }

                }


                #endregion


                return Redirect::to("admin/days/save/$day_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            } else {

                if (isset($this->data["success"]) && !empty($this->data["success"])) {
                    return Redirect::to("admin/days/save/$day_id")->with(
                        [
                            "msg" => $this->data["success"]
                        ]
                    )->send();
                } else {
                    $this->data["errors"] = $validator->messages();
                }

            }
        }

        return view("admin.subviews.days.save",$this->data);
    }

    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $day_names              = $request->get("day_name");

        foreach($all_langs as $key => $lang_item)
        {

            $current_day = array_shift($day_names);
            if (in_array($current_day, $day_names) && !empty($current_day))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم اليوم</div>";
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

            $rules_values["day_name_$key"]              = clean($request->get("day_name")[$key]);
            $rules_itself["day_name_$key"]              = "required|unique:days_translate,day_name,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["day_name_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["day_name_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        #region remove dependencies

            days_translate_m::where("day_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\days\days_m');
    }


}
