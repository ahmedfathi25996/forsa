<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\pages\pages_m;
use App\models\pages\pages_translate_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class pagesController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الصفحات");

            return $next($request);
        });

    }

    public function index()
    {
        $this->data["results"] = pages_m::get_pages(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "pages.page_order",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.pages.show", $this->data);
    }

    public function save(Request $request, $page_id = null)
    {
        $this->getAllLangs();
        $small_img_id                           = 0;

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($page_id != null)
        {

            $page_id    = intval($page_id);

            $cond       = [];
            $cond[]     = ["pages.page_id","=",$page_id];
            $item_data  = pages_m::get_pages(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = pages_translate_m::where("page_id",$page_id)->get();
            $small_img_id                           = $item_data->page_img_id;
            $item_data->page_img_id                 = attachments_m::find($item_data->page_img_id);
        }


        if ($request->method() == "POST")
        {
            $validator = $this->_saving_validation($request,$this->data["item_data_translate"],$this->data['all_langs']);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $request["small_img_id"]  = $this->general_save_img(
                    $request,
                    $item_id              = $page_id,
                    $img_file_name        = "small_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/pages",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $small_img_id
                );

                $input_data               = $request->all();

                // update
                if ($page_id != null) {

                    $check = pages_m::find($page_id)->update($request->all());

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/pages/save/$page_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }


                } else {

                    // insert
                    $check = pages_m::create($request->all());

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/pages/save" )->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $page_id = $check->page_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["page_id"]       = $page_id;
                    $inputs["page_title"]    = array_shift($input_data["page_title"]);
                    $inputs["page_body"]     = array_shift($input_data["page_body"]);
                    $inputs["page_slug"]     = trim(string_safe(array_shift($input_data["page_slug"])));

                    $inputs["lang_id"]       = $lang_item->lang_id;

                    $current_row             = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        pages_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        pages_translate_m::create($inputs);
                    }


                }
                return Redirect::to("admin/pages/save/$page_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            #endregion


            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/pages/save/$page_id")->with(
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


        return view("admin.subviews.pages.save",$this->data);
    }


    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $page_title             = $request->get("page_title");
        $page_body              = $request->get("page_body");
        $page_slug              = $request->get("page_slug");
        $small_img_id           = $request['small_img_file'];


        $rules_values["small_img_file"]             = $request['small_img_file'];
        $rules_itself["small_img_file"]             = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["small_img_file.image"]        = "صورة الصفحة غير صالحة";
        $attrs_names["small_img_file.mimes"]        = "صورة الصفحة غير صالحة";


        foreach($all_langs as $key => $lang_item)
        {

            $current_title = array_shift($page_title);
            if (in_array($current_title, $page_title) && !empty($current_title))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم الصفحة</div>";
                break;
            }



            $current_slug = array_shift($page_slug);
            if (in_array($current_slug, $page_slug) && !empty($current_slug))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم اللينك</div>";
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

            $rules_values["page_title_$key"]              = $request->get("page_title")[$key];
            $rules_itself["page_title_$key"]              = "required|unique:pages_translate,page_title,".$translate_row_id.",id,deleted_at,NULL";
            $attrs_names["page_title_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["page_title_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";


            $rules_values["page_body_$key"]               = $request->get("page_body")[$key];
            $rules_itself["page_body_$key"]               = "required";
            $attrs_names["page_body_$key.required"]       = "المحتوي في ".$lang_item->lang_text." مطلوب إدخالة ";

            $rules_values["page_slug_$key"]               = $request->get("page_slug")[$key];
            $rules_itself["page_slug_$key"]               = "required|unique:pages_translate,page_slug,".$translate_row_id.",id,deleted_at,NULL";
            $attrs_names["page_slug_$key.required"]       = "اللينك في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["page_slug_$key.unique"]         = "اللينك في ".$lang_item->lang_text." مسجل مسبقا ";



        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


    public function delete(Request $request){

        $item_id        = intval($request->get("item_id",0));

        #region remove dependencies

        pages_translate_m::where("page_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\pages\pages_m');
    }


}
