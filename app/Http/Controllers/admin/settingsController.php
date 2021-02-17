<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\orders\orders_m;
use App\models\settings_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class settingsController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الإعدادات");

            return $next($request);
        });

    }

    public function index(Request $request)
    {

        $settings = settings_m::get_settings();
        $settings = $settings->groupBy("setting_key")->all();

        #region list timezones

        $this->data["timezones"] = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);

        #endregion

        #region config files

            $logo                                       = $settings['logo'][0]->setting_value;
            $settings['logo'][0]->logo_img              = attachments_m::find($logo);

            $icon                                       = $settings['icon'][0]->setting_value;
            $settings['icon'][0]->icon_img              = attachments_m::find($icon);

            $pem_file                                   = $settings['pem_file'][0]->setting_value;
            $settings['pem_file'][0]->pem_file_obj      = attachments_m::find($pem_file);

        #endregion


        $this->data["settings"] = $settings;


        if($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request);
            if(count($validator->messages()) == 0 && empty($this->data["success"]))
            {

                #region save images and files

                $request["logo"]     = $this->general_save_img(
                    $request ,
                    $item_id                = 1,
                    $img_file_name          = "logo_img_file",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/settings/logo",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $logo
                );

                $request["icon"]     = $this->general_save_img(
                    $request ,
                    $item_id                = 1,
                    $img_file_name          = "icon_img_file",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/settings/icon",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $icon
                );

                $request["pem_file"]     = $this->general_save_img(
                    $request ,
                    $item_id                = 1,
                    $img_file_name          = "pem_file_input",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/settings/pem_file",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $pem_file
                );

                #endregion


                #region save all settings

                if(!isset($request["allowed_countries"]))
                {
                    $request["allowed_countries"] = [];
                }

                foreach($settings as $key => $setting)
                {

                    if($key == "currency")
                    {
                        // get orders
                        $get_orders = orders_m::get()->all();
                        if(is_array($get_orders) && count($get_orders))
                        {
                            continue;
                        }
                    }

                    if(!isset($request["$key"]))
                    {
                        continue;
                    }

                    if($key == "allowed_countries")
                    {
                        $request["$key"]  = json_encode($request["$key"]);
                    }

                    $check = settings_m::find($settings["$key"][0]->settings_id);
                    if(is_object($check))
                    {
                        $check->update([
                            "setting_value" => clean($request["$key"])
                        ]);
                    }

                }

                #endregion

                $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                return Redirect::to("admin/settings")->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/settings")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }

        return view("admin.subviews.settings.show", $this->data);
    }


    private function _saving_validation($request)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        #region rules and values

        $rules_values["name"]                           = clean($request->get("name"));
        $rules_itself["name"]                           = "required";

        $rules_values["allowed_countries"]              = clean($request->get("allowed_countries"));
        $rules_itself["allowed_countries"]              = "required";


        $rules_values["currency_rate"]                  = clean($request->get("currency_rate"));
        $rules_itself["currency_rate"]                  = "required|numeric|min:0|not_in:0";


        $rules_values["email"]                          = clean($request->get("email"));
        $rules_itself["email"]                          = "required|email";

        $rules_values["android_key"]                    = clean($request->get("android_key"));
        $rules_itself["android_key"]                    = "required";


        $rules_values["logo_img_file"]                  = $request["logo_img_file"];
        $rules_itself["logo_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";

        $rules_values["icon_img_file"]                  = $request["icon_img_file"];
        $rules_itself["icon_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";

        $rules_values["pem_file_input"]                 = $request["pem_file_input"];
        $rules_itself["pem_file_input"]                 = "nullable|mimes:pem";

        #endregion


        #region rules attributes names

        $attrs_names["name.required"]                   = "اسم التطبيق مطلوب إدخاله ";

        $attrs_names["allowed_countries.required"]      = "الدول المتاح فيها البيع مطلوب إدخالها ";

        $attrs_names["currency_rate.required"]          = "قيمة التحويل للدولار مطلوب إدخاله ";
        $attrs_names["currency_rate.numeric"]           = "قيمة التحويل للدولار يجب ان يكون رقم فقط ";
        $attrs_names["currency_rate.min"]               = "قيمة التحويل للدولار يجب ان يكون اكبر من 0 ";
        $attrs_names["currency_rate.not_in"]            = "قيمة التحويل للدولار يجب ان يكون اكبر من 0 ";

        $attrs_names["email.required"]                  = "البريد الإلكتروني للسيستيم مطلوب إدخاله ";
        $attrs_names["email.email"]                     = "البريد الإلكتروني للسيستيم غير صحيح ";

        $attrs_names["android_key.required"]            = "مفتاح الإشعارات للأندرويد مطلوب إدخاله ";

        $attrs_names["logo_img_file.image"]             = "صورة الشعار غير صالحة";
        $attrs_names["logo_img_file.mimes"]             = "صورة الشعار غير صالحة";

        $attrs_names["icon_img_file.image"]             = "صورة الأيقونه غير صالحة";
        $attrs_names["icon_img_file.mimes"]             = "صورة الأيقونه غير صالحة";

        $attrs_names["pem_file_input.image"]            = "ملف الإشعارات للأيفون غير صالحة";
        $attrs_names["pem_file_input.mimes"]            = "ملف الإشعارات للأيفون غير صالحة";

        #endregion


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


}
