<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\payment_method\payment_method_m;
use App\models\payment_method\payment_method_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\models\attachments_m;

class paymentMethodController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("وسائل الدفع");

            return $next($request);
        });

    }

    public function index()
    {

        $this->data["results"]      = payment_method_m::get_payment_methods(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "payment_method.payment_method_id",
            $order_by_type          = "desc"
        );

        return view("admin.subviews.payment_method.show", $this->data);
    }

    public function save(Request $request, $payment_method_id = null)
    {
        $this->getAllLangs();
        $img_id                           = 0;

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($payment_method_id != null)
        {

            $payment_method_id    = intval(clean($payment_method_id));

            $cond       = [];
            $cond[]     = ["payment_method.payment_method_id","=",$payment_method_id];
            $item_data  = payment_method_m::get_payment_methods(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = payment_method_translate_m::where("payment_method_id",$payment_method_id)->get();
            $img_id                                 = $item_data->payment_img_id;
            $item_data->payment_img_id              = attachments_m::find($item_data->payment_img_id);

        }


        if ($request->method() == "POST")
        {
            $validator = $this->_saving_validation($request,$this->data["item_data_translate"],$this->data['all_langs'],$item_data);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $request["img_id"]        = $this->general_save_img(
                    $request,
                    $item_id              = $payment_method_id,
                    $img_file_name        = "payment_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/payment_methods",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $img_id
                );

                $input_data               = $request->all();

                // update
                if ($payment_method_id != null) {
                    $check = payment_method_m::find($payment_method_id)->update(clean($input_data ));


                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/payment_methods/save/$payment_method_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }


                } else {

                    // insert
                    $check = payment_method_m::create(clean($input_data));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/payment_methods/save" )->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $payment_method_id = $check->payment_method_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["payment_method_id"]   = $payment_method_id;
                    $inputs["payment_method_name"] = clean(array_shift($input_data["payment_method_name"]));


                    $inputs["lang_id"]       = $lang_item->lang_id;

                    $current_row             = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        payment_method_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        payment_method_translate_m::create($inputs);
                    }


                }
                return Redirect::to("admin/payment_methods/save/$payment_method_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            #endregion


            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/payment_methods/save/$payment_method_id")->with(
                        [
                            "msg"=> $this->data["success"]
                        ]
                    )->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }


        return view("admin.subviews.payment_method.save",$this->data);
    }

    private function _saving_validation($request, $translate_rows, $all_langs,$item_data)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $payment_method_name    = clean($request["payment_method_name"]);

        $rules_values["payment_img_file"]              = $request['payment_img_file'];
        $rules_itself["payment_img_file"]              = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["payment_img_file.image"]         = "صورة وسيلة الدفع غير صالحة";
        $attrs_names["payment_img_file.mimes"]         = "صورة وسيلة الدفع غير صالحة";


        foreach($all_langs as $key => $lang_item)
        {

            $current_name = clean(array_shift($payment_method_name));
            if (in_array($current_name, $payment_method_name) && !empty($current_name))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم وسيلة الدفع</div>";
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

            $rules_values["payment_method_name_$key"]              = clean($request->get("payment_method_name")[$key]);
            $rules_itself["payment_method_name_$key"]              = "required|unique:payment_method_translate,payment_method_name,".$translate_row_id.",id,deleted_at,NULL";
            $attrs_names["payment_method_name_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["payment_method_name_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }




}
