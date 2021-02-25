<?php

namespace App\Http\Controllers\front\Auth;

use App\Http\Controllers\frontBaseController;
use App\User;
use Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class loginController extends frontBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $this->redirectLoggedUser();

        return view("panel_auth.subviews.login", $this->data);
    }

    public function login(Request $request)
    {

        $this->validate($request,
            [
                "email"     => "required|email",
                "password"  => "required"
            ],
            [
                "email.required"    => "البريد الإلكتروني مطلوب إدخالة",
                "email.email"       => "البريد الإلكتروني غير صحيح",
                "password.required" => "كلمة السر مطلوب إدخالها",
            ]
        );


        $email_login = Auth::attempt(
            [
                "email"         => $request->get("email"),
                "password"      => $request->get("password")
            ],
            $request->get("remember_me"));

        if($email_login)
        {

            $user_obj = Auth::user();
            Auth::login($user_obj);

            if($user_obj->is_active == 0){
                Auth::logout();

                return  Redirect::to('/login')->with(
                    [
                        "msg" => "<div class='alert alert-danger' style='text-align: center'>الحساب غير مفعل او موقوف </div>"
                    ]
                )->send();

            }

            if (in_array($user_obj->user_type,["admin","dev"]))
            {
                $request->session()->save();
                return redirect()->intended('admin/dashboard');
            }

            if (in_array($user_obj->user_type,["branch"]))
            {
                $request->session()->save();
                return redirect()->intended('branch/dashboard');
            }

        }
        else{

            return  Redirect::to('/login')->with(
                [
                    "msg" => "<div class='alert alert-danger' style='text-align: center'>خطأ فى بيانات تسجيل الدخول </div>"
                ]
            )->send();

        }

    }


    public function change_password(Request $request)
    {

        $user_code = $request->get("user_code");

        $user = User::where("user_code", $user_code)->get()->first();

        $this->data['user_code'] = $user_code;
        if (is_object($user)) {

            return view("front.subviews.change_password", $this->data);
        }


        return Redirect::to('login')->send();
    }

    public function save_change_password(Request $request)
    {

        $user_code = $request->get("user_code");
        $password = $request->get("password");

        $user = User::where("user_code", $user_code)->get()->first();

        $this->data['user_code'] = $user_code;
        if (is_object($user)) {

            $user->update([
                "password" => bcrypt($password)
            ]);

        }


        return view("front.subviews.Done", $this->data);

    }



}
