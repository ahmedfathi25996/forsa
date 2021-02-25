<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\promo_code_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class promoController extends adminBaseController
{
    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("اكواد التخفيض");

            return $next($request);
        });

    }

    public function index()
    {

        $this->data["results"]      = promo_code_m::get_promo_codes(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "promo_code.code_id",
            $order_by_type          = "desc"
        );

        return view("admin.subviews.promo_code.show", $this->data);
    }

    public function save(Request $request, $code_id = null)
    {
        $this->getAllLangs();

        $this->data["item_data"]                = "";

        if ($code_id != null)
        {

            $code_id    = intval(($code_id));

            $cond       = [];
            $cond[]     = ["promo_code.code_id","=",$code_id];
            $item_data  = promo_code_m::get_promo_codes(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
        }

        if ($request->method() == "POST")
        {
            $validator = $this->_saving_validation($request,$code_id);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {


                $input_data                  = $request->all();
                $input_data['is_used']     = 0;
                $input_data['start_date']    = date("Y-m-d H:i:s",strtotime($input_data['start_date']));
                $input_data['end_date']      = date("Y-m-d H:i:s",strtotime($input_data['end_date']));


                // update
                if ($code_id != null) {
                    $promo_obj = promo_code_m::find($code_id);
                    $promo_obj->update(($input_data));
                }
                else {
                    $promo_obj = promo_code_m::create(($input_data));
                }

                return Redirect::to("admin/promo_code/save/$promo_obj->code_id")->
                with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->
                send();

            }
            else{
                $this->data["errors"] = $validator->messages();
            }

        }


        return view("admin.subviews.promo_code.save",$this->data);

    }

    private function _saving_validation($request,$code_id)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];


        $rules_values["code_text"]                  = ($request->get("code_text"));
        $rules_itself["code_text"]                  ="required|unique:promo_code,code_text,".$code_id.",code_id,deleted_at,NULL";
        $attrs_names["code_text.required"]          = "  كود الخصم مطلوب ادخاله ";
        $attrs_names["code_text.unique"]            = "  كود الخصم مسجل مسبقا  ";

        $rules_values["start_date"]                 = ($request->get("start_date"));
        $rules_itself["start_date"]                 ="required";
        $attrs_names["start_date.required"]         = "  تاريخ بداية كود الخصم مطلوب ادخاله ";


        $rules_values["end_date"]                   = ($request->get("end_date"));
        $rules_itself["end_date"]                   ="required|after:start_date";
        $attrs_names["end_date.required"]           = "  تاريخ نهايه كود الخصم مطلوب ادخاله ";
        $attrs_names["end_date.after"]              = "وقت النهايه يجب ان يكون اكبر من تاريخ البدايه ";




        $rules_values["code_value"]                 = ($request->get("code_value"));
        $rules_itself["code_value"]                 = "required|numeric|min:0|not_in:0";
        $attrs_names["code_value.required"]         = "   قيمة الخصم مطلوب ادخاله ";
        $attrs_names["code_value.numeric"]          = "  الخصم يجب ان يكون رقم فقط ";
        $attrs_names["code_value.min"]              = "  الخصم يجب ان يكون اكبر من 0 ";
        $attrs_names["code_value.not_in"]           = "  الخصم يجب ان يكون اكبر من 0 ";




        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(($request->get("item_id",0)));

        #endregion

        $this->general_remove_item($request,'App\models\promo_code\promo_code_m');
    }


}
