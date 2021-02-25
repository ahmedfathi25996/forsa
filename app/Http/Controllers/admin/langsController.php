<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\langs_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class langsController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("اللغات");

            return $next($request);
        });

    }

    public function index()
    {
        $this->data["results"] = langs_m::get_langs();

        return view("admin.subviews.langs.show", $this->data);
    }

    public function save(Request $request, $lang_id = null)
    {

        $this->data["item_data"]    = "";
        $lang_img_id                = 0;

        if ($lang_id != null)
        {

            $lang_id        = intval($lang_id);

            $cond           = [];
            $cond[]         = ["langs.lang_id","=",$lang_id];
            $item_data      = langs_m::get_langs(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data              = $item_data[0];

            $lang_img_id            = $item_data->lang_img_id;
            $item_data->lang_img    = attachments_m::find($item_data->lang_img_id);

            $this->data["item_data"] = $item_data;
        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request, $lang_id);

            if (count($validator->messages()) == 0)
            {

                $request["lang_symbole"] = string_safe($request["lang_symbole"]);

                $request["lang_img_id"] = $this->general_save_img(
                    $request ,
                    $item_id                = $lang_id,
                    $img_file_name          = "lang_img_file",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/langs",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $lang_img_id
                );

                // update
                if ($lang_id != null)
                {

                    $check = langs_m::find($lang_id)->update($request->all());

                    if ($check == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                    }

                }
                else{

                    // insert
                    $check = langs_m::create($request->all());

                    if (is_object($check))
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                    }

                }

                return Redirect::to('admin/langs/save/'.$lang_id)->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                $this->data["errors"] = $validator->messages();

            }

        }

        return view("admin.subviews.langs.save",$this->data);
    }

    private function _saving_validation($request, $lang_id)
    {

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $lang_text              = $request->get("lang_text");
        $lang_symbole           = string_safe($request->get("lang_symbole"));
        $lang_img_file          = $request["lang_img_file"];


        $rules_values["lang_text"]                      = $lang_text;
        $rules_values["lang_symbole"]                   = $lang_symbole;
        $rules_values["lang_img_file"]                  = $lang_img_file;

        $rules_itself["lang_text"]                      = "required|unique:langs,lang_text,".$lang_id.",lang_id,deleted_at,NULL";
        $rules_itself["lang_symbole"]                   = "required|unique:langs,lang_symbole,".$lang_id.",lang_id,deleted_at,NULL";
        $rules_itself["lang_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";

        $attrs_names["lang_text.required"]              = "اسم اللغه مطلوب إدخالة";
        $attrs_names["lang_text.unique"]                = "اسم اللغه مسجل مسبقا";
        $attrs_names["lang_symbole.required"]           = "كود اللغه مطلوب إدخالة";
        $attrs_names["lang_symbole.unique"]             = "كود اللغه مسجل مسبقا";
        $attrs_names["lang_img_file.image"]             = "صورة اللغه غير صالحة";
        $attrs_names["lang_img_file.mimes"]             = "صورة اللغه غير صالحة";

        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


    public function delete(Request $request){

        $item_id        = intval($request->get("item_id",0));
        if ($item_id == 0)
        {
            $output["deleted"] = "<label class='alert alert-danger'>اللغه غير موجودة</label>";
            return json_encode($output);
        }
        elseif($item_id == 1)
        {
            $output["deleted"] = "<label class='alert alert-danger'>لا يمكن مسح اللغه الأساسية</label>";
            return json_encode($output);
        }

        $this->general_remove_item($request,'App\models\langs_m');
    }


}
