<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\days\days_m;
use App\models\days\days_translate_m;
use App\models\doctors\doctors_sessions_m;
use App\models\specialites\specialites_translate_m;
use App\models\specialites\specialites_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SessionController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الجلسات");

            return $next($request);
        });

    }

    public function index($doctor_id)
    {
         $this->data['doctor_id'] = $doctor_id;
         $cond[] = ["doctors_sessions.doctor_id","=",$doctor_id];
        $this->data["results"] = doctors_sessions_m::get_doctors_sessions(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc"
        );

        return view("admin.subviews.doctors.sessions.show", $this->data);
    }

    public function save(Request $request,$doctor_id, $session_id = null)
    {

        $this->getAllLangs();
        $doctor_id    = intval(clean($doctor_id));
        $this->data["item_data"]                = "";
        $this->data['doctor_id'] = $doctor_id;

        if ($session_id != null)
        {

            $session_id    = intval(clean($session_id));

            $cond       = [];
            $cond[]     = ["doctors_sessions.session_id","=",$session_id];
            $item_data  = doctors_sessions_m::get_doctors_sessions(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;

        }


        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $input_data = $request->all();
                $now = date('Y-m-d');
                if($now > $input_data['session_date'])
                {
                    $this->data["msg"] = "<div class='alert alert-danger'> خطا فى تسجيل التاريخ</div>";

                    return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                        "msg"=>$this->data["msg"]
                    ])->send();
                }

                if($input_data['time_from'] > $input_data['time_to'])
                {
                    $this->data["msg"] = "<div class='alert alert-danger'> خطا فى تسجيل الوقت</div>";

                    return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                        "msg"=>$this->data["msg"]
                    ])->send();
                }
                $get_session = doctors_sessions_m::where("session_date",$input_data['session_date'])
                    ->where("time_from",$input_data['time_from'])->
                    where("doctor_id",$doctor_id)->first();
                if(is_object($get_session))
                {
                    $this->data["msg"] = "<div class='alert alert-danger'> هذا الميعاد مسجل مسبقا</div>";

                    return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                        "msg"=>$this->data["msg"]
                    ])->send();
                }
                // update
                if ($session_id != null) {

                    $check = doctors_sessions_m::find($session_id)->update(clean($request->all()));

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/sessions/save/$session_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $request["doctor_id"] = $doctor_id;
                    $request['is_verified_by_admin'] = 1;

                    $check = doctors_sessions_m::create(clean($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $session_id = $check->session_id;

                }

                return Redirect::to("admin/doctors/$doctor_id/sessions/save/$session_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            } else {

                if (isset($this->data["success"]) && !empty($this->data["success"])) {
                    return Redirect::to("admin/doctors/$doctor_id/sessions/save/$session_id")->with(
                        [
                            "msg" => $this->data["success"]
                        ]
                    )->send();
                } else {
                    $this->data["errors"] = $validator->messages();
                }

            }
        }

        return view("admin.subviews.doctors.sessions.save",$this->data);
    }

    private function _saving_validation($request)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        $this->general_remove_item($request,'App\models\doctors\doctors_sessions_m');
    }


}
