<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\adminBaseController;
use App\models\bookings\booking_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\models\doctors\new_doctors_sessions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class usersController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("المستخدمين");

            return $next($request);
        });

    }

    public function index($user_status)
    {
        $cond       = [];

        if($user_status == "active")
        {
            $cond[]                 = ["users.is_active","=",1];
        }

        elseif($user_status == "disactive")
        {
            $cond[]                 = ["users.is_active","=",0];
        }

        elseif($user_status != 'all'){
            $cond[]                 = ["users.is_active","=",$user_status];
        }

        $this->data["results"]      = User::get_users_dashboard(
            $additional_and_wheres  = $cond,
            $free_conditions        = "users.user_type = 'user'",
            $order_by_col           = "users.user_id",
            $order_by_type          = "desc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 10
        );

        return view("admin.subviews.users.show", $this->data);
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

        $cond2       = [];
        $cond2[]     = ["booking.user_id","=",$user_id];
        $cond2[]     = ["booking.is_paid","=",1];
        $this->data['current_date'] = date('Y-m-d');


        $item_data2= booking_m::get_users_bookings_dashboard(
            $additional_and_wheres  = $cond2, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no");
        $this->data["results"]                = $item_data2;

        return view("admin.subviews.users.profile",$this->data);
    }

    public function getUserBookings($user_id)
    {
        $user_id   = intval(($user_id));
        $cond       = [];
        $cond[]     = ["booking.user_id","=",$user_id];

        $item_data2= booking_m::get_users_bookings_dashboard(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no")->all();

        abort_if((!count($item_data2)),404);

        $item_data2                              = $item_data2[0];
        $this->data["results"]                = $item_data2;
        return view("admin.subviews.users.bookings.show",$this->data);
    }

    public function getDoctorSessions($doctor_id,$session_id)
    {
        $this->data['doctor_id'] = $doctor_id;
        $this->data['session_id'] = $session_id;
        $cond[] = ["new_doctors_sessions.doctor_id","=",$doctor_id];

        $this->data["results"] = new_doctors_sessions::get_new_doctors_sessions(
            $additional_and_wheres  = $cond, $free_conditions        = "",
            $order_by_col           = "", $order_by_type          = "asc",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "no"
        );

        return view("admin.subviews.users.bookings.sessions", $this->data);
    }

    public function changeBooking(Request $request,$session_id)
    {
        $booking = booking_m::where("session_id",$session_id)->first();
        $new_booking  = doctors_sessions_m::where("session_id",$request->session_id)->first();
        $get_session = doctors_sessions_m::where("session_id",$session_id)->first();

        $booking->update([
           "session_id" => $request->session_id
        ]);

        return Redirect::to('/admin/clients');

    }



}
