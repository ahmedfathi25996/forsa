<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;

class adminController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("تعديل البيانات");

            return $next($request);
        });

    }

    public function edit(Request $request, $user_id = null)
    {
        $logo_id                           = 0;

        $this->data["item_data"]           = "";

        if ($user_id != null)
        {

            $user_id    = intval(clean($user_id));

            $cond       = [];
            $cond[]     = ["users.user_id","=",$user_id];
            $item_data  = User::get_users(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $logo_id                                = $item_data->logo_img_id;
            $item_data->logo_img_id                 = attachments_m::find($item_data->logo_img_id);
        }


        if ($request->method() == "POST")
        {
            $validator = $this->_saving_validation($request,$user_id);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $request["logo_id"]  = $this->general_save_img(
                    $request,
                    $item_id              = $user_id,
                    $img_file_name        = "logo_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/admins",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $logo_id
                );

                $input_data               = $request->all();

                // update
                if ($user_id != null) {
                    if(isset($input_data["current_password"]) && !empty($input_data["current_password"])) {
                        if (crypt($input_data["current_password"], $this->current_user_data->password) != $this->current_user_data->password) {
                            $this->data["msg"] = "<div class='alert alert-danger'> كلمة المرور الحالية غير صحيحة !!</div>";

                            return Redirect::to("branch/admins/edit/$user_id")->with([
                                "msg" => $this->data["msg"]
                            ])->send();
                        }
                    }
                    if (isset($input_data["password"]) && !empty($input_data["password"]))
                    {
                        if(strlen($input_data["password"]) < 3)
                        {
                            $this->data["msg"] = "<div class='alert alert-danger'> كلمة المرور الجديدة يجب ان لا تقل عن 3 احرف او ارقام !!</div>";

                            return Redirect::to("branch/admins/edit/$user_id")->with([
                                "msg"=>$this->data["msg"]
                            ])->send();
                        }

                        $input_data["password"] = bcrypt($input_data["password"]);
                    }
                    else{
                        $input_data["password"] = Auth::user()->password;
                    }


                    $check = User::find($user_id)->update(clean( $input_data));

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/admins/edit/$user_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }


                } else {

                    // insert
                    $check = User::create(clean( $input_data));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/admins/edit/$user_id" )->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $user_id = $check->user_id;

                }

                return Redirect::to("branch/admins/edit/$user_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            #endregion


            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("branch/admins/edit/$user_id")->with(
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


        return view("branch.subviews.admins.edit",$this->data);
    }



    private function _saving_validation($request, $user_id)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $rules_values["full_name"]                              = clean($request->get("full_name"));
        $rules_itself["full_name"]                              ="required|unique:users,full_name,".$user_id.",user_id,deleted_at,NULL";
        $attrs_names["full_name.required"]                      = "  اسم المستخدم مطلوب ادخاله ";
        $attrs_names["full_name.unique"]                        = " هذا الاسم مسجل مسبقا ";


        $rules_values["email"]                                  = clean($request->get("email"));
        $rules_itself["email"]                                  ="required|email|unique:users,email,".$user_id.",user_id,deleted_at,NULL";
        $attrs_names["email.required"]                          = "  ايميل المستخدم مطلوب ادخاله ";
        $attrs_names["email.email"]                             = "هذا الايميل غير صحيح ";
        $attrs_names["email.unique"]                            = " هذا الايميل مسجل مسبقا ";

        $rules_values["password"]                               = clean($request['password']);
        $rules_itself["password"]                               ="confirmed";
        $attrs_names["password.confirmed"]                      = "  الرقم السري لا يتطابق ";

        $rules_values["password_confirmation"]                  = clean($request->get("password_confirmation"));
        $rules_itself["password_confirmation"]                  ="required_with:new_password";
        $attrs_names["password_confirmation.required_with"]     = " تاكيد الرقم السري مطلوب ادخاله ";

        $rules_values["logo_img_file"]                          = $request['logo_img_file'];
        $rules_itself["logo_img_file"]                          = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["logo_img_file.image"]                     = "صورة الصفحة غير صالحة";
        $attrs_names["logo_img_file.mimes"]                     = "صورة الصفحة غير صالحة";


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }



}
