<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\specialites\specialites_translate_m;
use App\models\specialites\specialites_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SpecialitesController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("التخصصات");

            return $next($request);
        });

    }

    public function index()
    {

        $this->data["results"] = specialites_m::get_specialites(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.specialites.show", $this->data);
    }

    public function save(Request $request, $spe_id = null)
    {

        $this->getAllLangs();

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($spe_id != null)
        {

            $spe_id    = intval(($spe_id));

            $cond       = [];
            $cond[]     = ["specialites.spe_id","=",$spe_id];
            $item_data  = specialites_m::get_specialites(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = specialites_translate_m::where("spe_id",$spe_id)->get();

        }


        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $input_data = $request->all();

                // update
                if ($spe_id != null) {

                    $check = specialites_m::find($spe_id)->update(($request->all()));

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/specialites/save/$spe_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $check = specialites_m::create(($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/specialites/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $spe_id = $check->spe_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["spe_id"]   = $spe_id;
                    $inputs["title"] = (array_shift($input_data["title"]));
                    $inputs["lang_id"]  = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        specialites_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        specialites_translate_m::create($inputs);
                    }

                }


                #endregion


                return Redirect::to("admin/specialites/save/$spe_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            } else {

                if (isset($this->data["success"]) && !empty($this->data["success"])) {
                    return Redirect::to("admin/specialites/save/$spe_id")->with(
                        [
                            "msg" => $this->data["success"]
                        ]
                    )->send();
                } else {
                    $this->data["errors"] = $validator->messages();
                }

            }
        }

        return view("admin.subviews.specialites.save",$this->data);
    }

    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $title              = $request->get("title");

        foreach($all_langs as $key => $lang_item)
        {

            $current_day = array_shift($title);
            if (in_array($current_day, $title) && !empty($current_day))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار  الاسم</div>";
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

            $rules_values["title_$key"]              = ($request->get("title")[$key]);
            $rules_itself["title_$key"]              = "required|unique:specialites_translate,title,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["title_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["title_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(($request->get("item_id",0)));

        #region remove dependencies

            specialites_translate_m::where("spe_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\specialites\specialites_m');
    }


}
