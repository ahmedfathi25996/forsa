<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\doctors\certificates\certificates_m;
use App\models\doctors\certificates\certificates_translate_m;
use App\models\days\days_m;
use App\models\days\days_translate_m;
use App\models\specialites\specialites_translate_m;
use App\models\specialites\specialites_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CertificatesController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الشهادات");

            return $next($request);
        });

    }

    public function index($doctor_id)
    {
        $this->data['doctor_id'] = $doctor_id;
        $cond[] = ["doctors_certificates.doctor_id","=",$doctor_id];

        $this->data["results"] = certificates_m::get_doctors_certificates(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.doctors.certificates.show", $this->data);
    }

    public function save(Request $request,$doctor_id, $cer_id = null)
    {

        $this->getAllLangs();
        $doctor_id    = intval(clean($doctor_id));
        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);
        $this->data['doctor_id'] = $doctor_id;

        if ($cer_id != null)
        {

            $cer_id    = intval(clean($cer_id));

            $cond       = [];
            $cond[]     = ["doctors_certificates.cer_id","=",$cer_id];
            $item_data  = certificates_m::get_doctors_certificates(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = certificates_translate_m::where("cer_id",$cer_id)->get();

        }


        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $input_data = $request->all();

                // update
                if ($cer_id != null) {

                    $check = certificates_m::find($cer_id)->update(clean($request->all()));

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/certificates/save/$cer_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $request["doctor_id"] = $doctor_id;

                    $check = certificates_m::create(clean($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/certificates/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $cer_id = $check->cer_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["cer_id"]   = $cer_id;
                    $inputs["title"] = clean(array_shift($input_data["title"]));
                    $inputs["lang_id"]  = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        certificates_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        certificates_translate_m::create($inputs);
                    }

                }


                #endregion


                return Redirect::to("admin/doctors/$doctor_id/certificates/save/$cer_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            } else {

                if (isset($this->data["success"]) && !empty($this->data["success"])) {
                    return Redirect::to("admin/doctors/$doctor_id/certificates/save/$cer_id")->with(
                        [
                            "msg" => $this->data["success"]
                        ]
                    )->send();
                } else {
                    $this->data["errors"] = $validator->messages();
                }

            }
        }

        return view("admin.subviews.doctors.certificates.save",$this->data);
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

            $rules_values["title_$key"]              = clean($request->get("title")[$key]);
            $rules_itself["title_$key"]              = "required|unique:specialites_translate,title,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["title_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["title_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        #region remove dependencies

        certificates_translate_m::where("cer_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\doctors\certificates\certificates_m');
    }


}
