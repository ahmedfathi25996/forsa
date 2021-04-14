<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\Jobs\send_push;
use App\models\doctors\doctors_sessions_m;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class dashboardController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

    }

    public function index()
    {
        $this->setMetaTitle("لوحة التحكم");

        $this->data['users_count'] = User::where("user_type","user")->whereNull("deleted_at")->count();
        $this->data['doctors_count'] = User::where("user_type","doctor")->whereNull("deleted_at")->count();
        $this->data['booked_sessions_count'] = doctors_sessions_m::where("is_booked",1)->whereNull("deleted_at")->count();
        $this->data['finished_sessions_count'] = doctors_sessions_m::where("is_done",1)->whereNull("deleted_at")->count();



        return view("admin.subviews.index", $this->data);
    }

    public function send_general_notification(Request $request)
    {

        if($request->method() == "POST")
        {

            $this->validate($request,
                [
                    "title"         => "required",
                    "message"       => "required",
                    "device_type"   => "required|in:all,android,ios"
                ],
                [
                    "title.required"    => "العنوان مطلوب إدخاله",
                    "message.required"  => "الرسالة مطلوب إدخاله",
                ]
            );

            $request = $request->all();

            $usersTokens = User::get_users_tokens($request["device_type"],$offset = 0,$limit = 10);

            if(is_array($usersTokens) && count($usersTokens))
            {

                $data = [];
                $data['title'] = $request["title"];
                $data['body']  = $request["message"];
                $data['sound'] = 'default';
                $data['badge'] = 2;
                $data['addition_data'] = [
                    'type'  => "general"
                ];

                dispatch(new send_push(
                    $usersTokens,
                    $data,
                    0,
                    10,
                    true,
                    $request["device_type"]
                ));

                $this->data["msg"] = "<div class='alert alert-success'> تم الإرسال بنجاح </div>";

            }
            else{
                $this->data["msg"] = "<div class='alert alert-danger'> لا يوجد اجهزة مسجله حتي الان ! </div>";
            }


            return Redirect::to('admin/send_general_notification')->with([
                "msg" => $this->data["msg"]
            ])->send();

        }

        return view("admin.subviews.push_notification.send_general_notification",$this->data);

    }


}
