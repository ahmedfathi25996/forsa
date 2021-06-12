<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\bookings\booking_m;
use App\models\doctors\doctors_sessions_m;
use App\models\doctors\new_doctors_sessions;
use App\models\specialites\specialites_translate_m;
use App\models\specialites\specialites_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DoctorBookingController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الحجوزات");

            return $next($request);
        });

    }

    public function index($doctor_id)
    {
        $this->data['doctor_id'] = $doctor_id;
        $cond[] = ["new_doctors_sessions.doctor_id","=",$doctor_id];

        $this->data["results"] = booking_m::get_users_bookings_dashboard(
            $additional_and_wheres  = $cond, $free_conditions        = "",
            $order_by_col           = "", $order_by_type          = "asc",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no"
        );

        return view("admin.subviews.doctors.booking.show", $this->data);
    }
/*
    public function save(Request $request,$doctor_id, $session_id = null)
    {

        $this->getAllLangs();
        $doctor_id    = intval(($doctor_id));
        $this->data["item_data"]                = "";
        $this->data['doctor_id'] = $doctor_id;

        if ($session_id != null)
        {

            $session_id    = intval(($session_id));

            $cond       = [];
            $cond[]     = ["new_doctors_sessions.session_id","=",$session_id];
            $item_data  = new_doctors_sessions::get_new_doctors_sessions(
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

                if($input_data['time_from'] > $input_data['time_to'])
                {
                    $this->data["msg"] = "<div class='alert alert-danger'> خطا فى تسجيل الوقت</div>";

                    return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                        "msg"=>$this->data["msg"]
                    ])->send();
                }
                $get_session = new_doctors_sessions::where("session_day",$input_data['session_day'])
                    ->where("time_from",$input_data['time_from'])->
                    where("doctor_id",$doctor_id)->first();
                if(is_object($get_session))
                {
                    $this->data["msg"] = "<div class='alert alert-danger'> هذا الميعاد مسجل مسبقا</div>";

                    return Redirect::to("admin/doctors/$doctor_id/sessions/save")->with([
                        "msg"=>$this->data["msg"]
                    ])->send();
                }
                $now_date = date('Y-m-d');



                // update
                if ($session_id != null) {
                    $get_session = new_doctors_sessions::find($session_id);
                    $booking = booking_m::join("new_doctors_sessions", function ($join){
                        $join->on("booking.session_id","=","new_doctors_sessions.session_id")
                            ->whereNull("new_doctors_sessions.deleted_at");

                    })->where("new_doctors_sessions.doctor_id",$doctor_id)
                        ->where("new_doctors_sessions.session_day",$get_session->session_day)
                        ->where("time_from",$get_session->time_from)
                        ->where("booking.session_date",">=",$now_date)->first();
                    if(is_object($booking))
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> هذا الميعاد محجوز لا يمكن تعديله او مسحه</div>";
                        return Redirect::to("admin/doctors/$doctor_id/sessions/save/$session_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }
                    $check = new_doctors_sessions::find($session_id)->update(($request->all()));

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

                    $check = new_doctors_sessions::create(($request->all()));

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


        $item_id        = intval(($request->get("item_id",0)));


        $this->general_remove_item($request,'App\models\doctors\new_doctors_sessions_m');
    }

*/
}
