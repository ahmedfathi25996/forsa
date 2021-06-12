<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_specialites_m;
use App\models\doctors\doctors_translate_m;
use App\models\notification_m;
use App\models\orders\orders_m;
use App\models\specialites\specialites_m;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الأطباء");

            return $next($request);
        });

    }

    public function index()
    {
        $this->data["results"]      = doctors_m::get_doctors(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 10
        );

        return view("admin.subviews.doctors.show", $this->data);
    }

    public function getUser($user_id)
    {
        $user_id   = intval(($user_id));
        $cond       = [];
        $cond[]     = ["users.user_id","=",$user_id];
        $item_data  = User::get_users_dashboard(
            $additional_and_wheres = $cond,
            $free_conditions       = "users.user_type = 'user'"
        )->all();
        abort_if((!count($item_data)),404);

        $item_data                              = $item_data[0];
        $this->data["item_data"]                = $item_data;
        $this->data["total_orders"] = orders_m::where('user_id',$user_id)->whereNull('orders.deleted_at')->count();
        return view("admin.subviews.users.profile",$this->data);
    }

    public function save(Request $request, $doctor_id = null)
    {
        $this->getAllLangs();
        $img_id                = 0;
        $user_id                =0;
        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        if ($doctor_id != null)
        {

            $doctor_id    = intval(($doctor_id));

            $cond       = [];
            $cond[]     = ["doctors.doctor_id","=",$doctor_id];
            $item_data  = doctors_m::get_doctors(
                $additional_and_wheres  = $cond, $free_conditions   = "",
                $order_by_col           = "", $order_by_type        = "",
                $limit                  = 0 , $offset               = 0,
                $paginate               = 0 , $return_obj           = "yes"
            );
            abort_if((!is_object($item_data)),404);
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = doctors_translate_m::where("doctor_id",$doctor_id)->get();
            $img_id                                 = $item_data->doctor_img_id;
            $item_data->doctor_img_id               = attachments_m::find($item_data->doctor_img_id);
            $user_id = $item_data->user_id;


        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request,$this->data["item_data_translate"],$this->data["all_langs"],$user_id);
            if (count($validator->messages()) == 0 && empty($this->data["success"])) {
                $input_data = $request->all();

                $user_data              = [];
                $user_data["logo_id"]        = $this->general_save_img(
                    $request,
                    $item_id              = $user_id,
                    $img_file_name        = "doctor_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/doctors",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $img_id
                );
                $user_data["email"]     = ($request["email"]);
                $user_data["password"]  = bcrypt($request["password"]);
                $user_data["user_type"] = "doctor";
                $user_data["is_active"] = 1;
                $user_data["username"] = ($request["username"]);


                #region save slider images

                $request["json_values_of_slidergallery_slider_file"] = json_decode($request->get("json_values_of_slidergallery_slider_file"));

                $request["certificates_ids"] = $this->general_save_slider(
                    $request,
                    $field_name             = "gallery_slider_file",
                    $width                  = 0,
                    $height                 = 0,
                    $new_title_arr          = "",
                    $new_alt_arr            = "",
                    $json_values_of_slider  = $request["json_values_of_slidergallery_slider_file"],
                    $old_title_arr          = "",
                    $old_alt_arr            = "",
                    $path                   = "/doctors/certificates"
                );

                $request["certificates_ids"] = json_encode($request["certificates_ids"]);

                #endregion


                // update
                if ($doctor_id != null) {
                    if (isset($request["password"]) && !empty($request["password"]))
                    {
                        if(strlen($request["password"]) < 3)
                        {
                            $this->data["msg"] = "<div class='alert alert-danger'> كلمة المرور  يجب ان لا تقل عن 3 احرف او ارقام !!</div>";

                            return Redirect::to("admin/doctors/save")->with([
                                "msg"=>$this->data["msg"]
                            ])->send();
                        }

                        $user_data["password"] = bcrypt($request["password"]);
                    }
                    else{
                        $get_user = User::where("user_id",$user_id)->first();
                        $user_data["password"] = $get_user->password;
                    }

                    $check = doctors_m::find($doctor_id)->update(($request->all()));
                    $user_update= User::where('user_id',$user_id)->update($user_data);


                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/save/$doctor_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    #region save users

                    $user = User::create($user_data);

                    #endregion

                    // insert
                    $request['user_id'] = $user->user_id;
                    $check = doctors_m::create(($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                    }

                    $doctor_id = $check->doctor_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["doctor_id"] = $doctor_id;
                    $inputs["job_title"] = (array_shift($input_data["job_title"]));
                    $inputs["country"] = (array_shift($input_data["country"]));
                    $inputs["full_name"] = (array_shift($input_data["full_name"]));
                    $inputs["brief_bio"] = (array_shift($input_data["brief_bio"]));
                    $inputs["specialties"] = (array_shift($input_data["specialties"]));
                    $inputs["lang_id"] = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        doctors_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        doctors_translate_m::create($inputs);
                    }


                }
                return Redirect::to("admin/doctors/save/$doctor_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/doctors/save/$doctor_id")->with(
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


        return view("admin.subviews.doctors.save",$this->data);
    }

    private function _saving_validation($request, $translate_rows, $all_langs,$user_id)
    {
        $this->data["success"]                   = "";

        $rules_values                            = [];
        $rules_itself                            = [];
        $attrs_names                             = [];

        $full_name                             = ($request->get("full_name"));
        $job_title                              = ($request->get("job_title"));
        $country                              = ($request->get("country"));
        $img_id                                  = $request['doctor_img_file'];


        $rules_values["email"]                         = $request["email"];
        $rules_itself["email"]                         = "required|email|unique:users,email," . $user_id . ",user_id,deleted_at,NULL";


        $rules_values["password"]                      = $request["password"];
        $rules_itself["password"]                      = "confirmed";

        $rules_values["password_confirmation"]         = ($request->get("password_confirmation"));
        $rules_itself["password_confirmation"]         ="required_with:password";

        $rules_values["doctor_img_file"]                  = $request['doctor_img_file'];
        $rules_itself["doctor_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["doctor_img_file.image"]             = "صورة الصفحة غير صالحة";
        $attrs_names["doctor_img_file.mimes"]             = "صورة الصفحة غير صالحة";

        foreach($all_langs as $key => $lang_item)
        {

            $current_name = array_shift($full_name);
            if (in_array($current_name, $full_name) && !empty($current_name))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار الاسم</div>";
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

            $rules_values["full_name_$key"]              = $request->get("full_name")[$key];
            $rules_itself["full_name_$key"]              = "required|unique:doctors_translate,full_name,".$translate_row_id.",id,deleted_at,NULL";

            $attrs_names["full_name_$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["full_name_$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";


        }



        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(($request->get("item_id",0)));

        #region remove dependencies

        doctors_translate_m::where("doctor_id",$item_id)->delete();

        #endregion

        $this->general_remove_item($request,'App\models\doctors\doctors_m');
    }

    public function getDoctorsSpecialites($doctor_id)
    {
        $doctor_id   = intval(($doctor_id));
        $cond       = [];
        $cond[]     = ["doctors_specialites.doctor_id","=",$doctor_id];
        $this->data['doctor_id']  = $doctor_id;

        $this->data["results"]      = doctors_specialites_m::get_doctors_specialites(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 10
        );

        return view("admin.subviews.doctors.specialites.show", $this->data);

    }

    public function saveDoctorSpecialites(Request $request, $doctor_id,$doc_spe_id = null)
    {
        $this->getAllLangs();
        $this->data["specialites"] = specialites_m::get_specialites(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc"
        );

        if(!is_array($this->data["specialites"]->all()) || !count($this->data["specialites"]->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد تخصصات ,اضف اولا !!</div>";
            return Redirect::to("admin/specialites/save/")->with([
                "msg" => $this->data["success"]
            ])->send();
        }

        $this->data["item_data"]                = "";
        $doctor_id    = intval(($doctor_id));
        $this->data['doctor_id'] = $doctor_id;


        if ($doc_spe_id != null)
        {

            $doc_spe_id                   = intval(($doc_spe_id));
            $this->data["doc_spe_id"]     = $doc_spe_id;

            $cond       = [];
            $cond[]     = ["doctors_specialites.doc_spe_id","=",$doc_spe_id];
            $item_data  = doctors_specialites_m::get_doctors_specialites(
                $additional_and_wheres  = $cond, $free_conditions   = "",
                $order_by_col           = "", $order_by_type        = "",
                $limit                  = 0 , $offset               = 0,
                $paginate               = 0 , $return_obj           = "yes"
            );

            abort_if((!is_object($item_data)),404);

            $this->data["item_data"]                = $item_data;


        }

        if ($request->method() == "POST")
        {
                $input_data = $request->all();

                // update
                if ($doc_spe_id != null)
                {

                    $check      = doctors_specialites_m::find($doc_spe_id);
                    $is_updated = $check->update(($request->all()));

                    if ($is_updated == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/spec/save/$doc_spe_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                else{


                    $request['doctor_id'] = $doctor_id;
                    // insert
                    $check = doctors_specialites_m::create(($request->all()));

                    if (is_object($check))
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/spec/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $doc_spe_id = $check->doc_spe_id;

                }

                return Redirect::to("admin/doctors/$doctor_id/spec/save/$doc_spe_id")->with([
                    "msg" => $this->data["success"]
                ])->send();




        }

        return view("admin.subviews.doctors.specialites.save",$this->data);
    }

    public function deleteDoctorSpecilites(Request $request,$doctor_id)
    {
        $item_id        = intval(($request->get("item_id",0)));

        #region remove dependencies

        doctors_specialites_m::where("doc_spe_id",$item_id)->where("doctor_id",$doctor_id)->delete();

        #endregion
        $this->general_remove_item($request,'App\models\doctors\doctors_specialites');

    }

    public function showChanges($doctor_id)
    {
        $this->data['doctor_id'] =$doctor_id;
        $cond = [];
        $cond[] = ["doctors.doctor_id","=",$doctor_id];
        $this->data["results"]      = doctors_m::get_doctors(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 10
        );

        return view("admin.subviews.doctors.changes", $this->data);
    }

    public function approveData(Request $request,$doctor_id)
    {
        $doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $user_id = $doctor->user_id;
        $get_user = User::find($user_id);
        $get_user->update([
           "mobile_number" => $get_user->temp_mobile_number,
           "age" => $get_user->temp_age,
           "gender" => $get_user->temp_gender,
           "username" => $get_user->temp_username,
            "email" => $get_user->temp_email
        ]);

        $get_user->update([
            "temp_mobile_number" => "",
            "temp_age" => "",
            "temp_gender" => "",
            "temp_username" => "",
            "temp_email" => ""
        ]);

        notification_m::create([
            "to_user_id" => $doctor->user_id,
            "to_user_type" => "doctor",
            "not_type" => "update_profile",
            "not_title" => "You request to update your profile is approved"
        ]);

        return Redirect::to("admin/doctors");



    }

    public function showBioChanges($doctor_id)
    {

        $cond       = [];
        $cond[]     = ["doctors.doctor_id","=",$doctor_id];
        $this->data['doctor_id'] = $doctor_id;
        $this->data['results'] = doctors_m::get_dashboard_doctors($additional_and_wheres = $cond);
        return view("admin.subviews.doctors.bio_changes", $this->data);

    }

    public function approveDoctorBio($doctor_id)
    {
        $doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $doctor->update([
            "price" => $doctor->temp_price,
            "years_of_experience" => $doctor->temp_years_of_experience,
            "video_id" => $doctor->temp_video_id,
            "certificates_ids" => $doctor->temp_certificates_ids
        ]);

        $doctor->update([
            "temp_price" => "",
            "temp_years_of_experience" => "",
            "temp_video_id" => "",
            "temp_certificates_ids" => ""
        ]);

        notification_m::create([
            "to_user_id" => $doctor->user_id,
            "to_user_type" => "doctor",
            "not_type" => "update_profile",
            "not_title" => "You request to update your profile is approved"
        ]);

        return Redirect::to("admin/doctors");

    }





}
