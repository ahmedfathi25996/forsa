<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\social_list\social_list_m;
use App\models\social_list\social_list_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class socialController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("مواقع التواصل");

            return $next($request);
        });

    }

    public function index()
    {
        $this->data["results"] = social_list_m::get_social_pages(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "social_list.social_order",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.social_list.show", $this->data);
    }

    public function save(Request $request, $social_list_id = null)
    {
        $this->getAllLangs();
        $img_id                = 0;

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($social_list_id != null)
        {

            $social_list_id    = intval($social_list_id);

            $cond       = [];
            $cond[]     = ["social_list.social_list_id","=",$social_list_id];
            $item_data  = social_list_m::get_social_pages(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = social_list_translate_m::where("social_list_id",$social_list_id)->get();
            $img_id                                 = $item_data->social_img_id;
            $item_data->social_img_id               = attachments_m::find($item_data->social_img_id);

        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request,$this->data["item_data_translate"],$this->data["all_langs"]);
            if (count($validator->messages()) == 0 && empty($this->data["success"])) {
                $request["img_id"]        = $this->general_save_img(
                    $request,
                    $item_id              = $social_list_id,
                    $img_file_name        = "social_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/social_list",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $img_id
                );

                $input_data = $request->all();


                // update
                if ($social_list_id != null) {

                    $check = social_list_m::find($social_list_id)->update($request->all());

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/social_list/save/$social_list_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $check = social_list_m::create($request->all());

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                    }

                    $social_list_id = $check->social_list_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["social_list_id"] = $social_list_id;
                    $inputs["name"] = array_shift($input_data["name"]);


                    $inputs["lang_id"] = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        social_list_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        social_list_translate_m::create($inputs);
                    }


                }
                return Redirect::to("admin/social/save/$social_list_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/social/save/$social_list_id")->with(
                        [
                            "msg"=> $this->data["success"]
                        ]
                    )->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }


            #endregion



        }


        return view("admin.subviews.social_list.save",$this->data);
    }

    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]                   = "";

        $rules_values                            = [];
        $rules_itself                            = [];
        $attrs_names                             = [];

        $social_name                             = ($request->get("name"));
        $social_url                              = ($request->get("social_url"));
        $img_id                                  = $request['social_img_file'];

        $rules_values["social_url"]              = $request->get("social_url");
        $rules_itself["social_url"]              = "required";
        $attrs_names["social_url.required"]      = "اللينك مطلوب ادخاله ";

        $rules_values["social_img_file"]                  = $request['social_img_file'];
        $rules_itself["social_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["social_img_file.image"]             = "صورة الصفحة غير صالحة";
        $attrs_names["social_img_file.mimes"]             = "صورة الصفحة غير صالحة";

        foreach($all_langs as $key => $lang_item)
        {

            $current_social = array_shift($social_name);
            if (in_array($current_social, $social_name) && !empty($current_social))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم السوشيال</div>";
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

            $rules_values["name_$key"]              = $request->get("name")[$key];
            $rules_itself["name_$key"]              = "required|unique:tags_translate,tag_name,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["name_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["name_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";


        }



        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(($request->get("item_id",0)));

        #region remove dependencies

        social_list_translate_m::where("social_list_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\social_list\social_list_m');
    }




}
