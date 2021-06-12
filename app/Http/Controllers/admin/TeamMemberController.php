<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\social_list\social_list_m;
use App\models\social_list\social_list_translate_m;
use App\models\team_member_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class TeamMemberController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("Team Members");

            return $next($request);
        });

    }

    public function index()
    {
        $this->data["results"] = team_member_m::get_team_member(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "team_member.team_id",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.team.show", $this->data);
    }

    public function save(Request $request, $team_id = null)
    {

        $img_id                = 0;

        $this->data["item_data"]                = "";

        if ($team_id != null)
        {

            $team_id    = intval($team_id);

            $cond       = [];
            $cond[]     = ["team_member.team_id","=",$team_id];
            $item_data  = team_member_m::get_team_member(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $img_id                                 = $item_data->user_img_id;
            $item_data->user_img_id               = attachments_m::find($item_data->user_img_id);

        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request);
            if (count($validator->messages()) == 0 && empty($this->data["success"])) {
                $request["img_id"]        = $this->general_save_img(
                    $request,
                    $item_id              = $team_id,
                    $img_file_name        = "team_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/team",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $img_id
                );

                $input_data = $request->all();


                // update
                if ($team_id != null) {

                    $check = team_member_m::find($team_id)->update($request->all());

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/team/save/$team_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $check = team_member_m::create($request->all());

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                    }

                    $team_id = $check->team_id;

                }



                return Redirect::to("admin/team/save/$team_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/team/save/$team_id")->with(
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


        return view("admin.subviews.team.save",$this->data);
    }

    private function _saving_validation($request)
    {
        $this->data["success"]                   = "";

        $rules_values                            = [];
        $rules_itself                            = [];
        $attrs_names                             = [];

        $name                             = ($request->get("name"));
        $title                              = ($request->get("title"));
        $img_id                                  = $request['team_img_file'];

        $rules_values["name"]              = $request->get("name");
        $rules_itself["name"]              = "required";
        $attrs_names["name.required"]      = "الاسم مطلوب ادخاله ";

        $rules_values["title"]              = $request->get("title");
        $rules_itself["title"]              = "required";
        $attrs_names["title.required"]      = "المسمى الوظيفى مطلوب ادخاله ";

        $rules_values["team_img_file"]                  = $request['team_img_file'];
        $rules_itself["team_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["team_img_file.image"]             = "صورة الصفحة غير صالحة";
        $attrs_names["team_img_file.mimes"]             = "صورة الصفحة غير صالحة";




        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(($request->get("item_id",0)));


        $this->general_remove_item($request,'App\models\team_member_m');
    }




}
