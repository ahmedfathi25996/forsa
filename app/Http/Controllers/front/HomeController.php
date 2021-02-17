<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\frontBaseController;
use App\Http\Controllers\RtcTokenBuilder;
use App\models\support_messages_m;
use App\Notifications\mail\sendVerificationCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends frontBaseController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        return view("front.subviews.index", $this->data);

    }

    public function join()
    {

        return view("front.subviews.join", $this->data);

    }

    public function contactUs(Request $request)
    {


        if($request->method() == "POST")
        {

            $data = clean($request->all());

            support_messages_m::create([
                "msg_type" => "support",
                "full_name" => $data["name"]." ".$data["surname"],
                "phone" => $data["phone"],
                "email" => $data["email"],
                "message" => $data["message"],
            ]);


            $this->data["success"] = "<div class='alert alert-success'>Message is sent successfully...</div>";
            return Redirect::to('contact-us')->with([
                "msg" => $this->data["success"]
            ])->send();

        }


        return view("front.subviews.contact-us", $this->data);

    }

    public function faQs()
    {

        return view("front.subviews.faQs", $this->data);

    }

    public function privacy()
    {

        return view("front.subviews.privacy", $this->data);

    }

    #region video call
    public function session()
    {
        $session_date = "2021-02-17";
        $time_to = "14:59:00";
        $time = strtotime($session_date." ".$time_to);
        $appid = "565e8fe5f9834c5a976ea6c06b2503ab";
        $channel_name  = md5("#!@!#!*&*(&" . "sponsor_btm" . "#!@!#!*&*(&" . time() . random_bytes(5));

       // $time = time() + 3600;
        $token = RtcTokenBuilder::buildTokenWithUid($appid,'a2d8f40705f44490b39449213ce29837',$channel_name,null,1,$time);
        if (strpos($token, '/') !== false) {
            header("Refresh:0");
        }
        return view('front.session',compact('token','channel_name','appid'));
    }


    public function join_video($channel_name,$appid,$token)
    {
        return view("front.video",compact('token','channel_name','appid'));
    }

    #endregion


}
