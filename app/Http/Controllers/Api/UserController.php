<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RtcTokenBuilder;
use App\Services\IAuthService;
use App\Services\IUserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class UserController extends api_controller
{
    /**
     * @var IAuthService
     */
    protected $service;
    protected $validator;

    /**
     * AuthController constructor.
     * @param IAuthService $service
     * @param ValidationHelper $validator
     */
    public function __construct(IUserService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }


    public function getProfile()
    {
        $user = Auth::user();

        return $this->service->getProfile($user);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $messages = [

        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $data,
            [
                'username'      => 'required',
                'email'          => 'required|email',
                "city"           => 'required',
                "is_treated_before" => "required",
                "mobile_number"   => "required",
                "age"              => "required|numeric",
                "gender"            => "required|in:male,female,prefer_not_to_say",


            ],
            $messages
        );


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->updateProfile($request, $user);

    }

    public function updateProfileImage(Request $request)
    {
        $user = Auth::user();

        return $this->service->updateProfileImage($request, $user);

    }

    public function changeMobile(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $messages = [
            'mobile_number.required'    => Lang::get("auth.require_mobile_number"),
            'mobile_number.numeric'     => Lang::get("auth.numeric_mobile_number"),
            'mobile_number.unique'      => Lang::get("general.unique_mobile_number"),
            'mobile_number.digits'      => Lang::get("auth.digits_mobile_number"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'mobile_number' => 'required|numeric|digits:11',
            ],
            $messages
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->changeMobile($request, $user, $data);

    }

    public function checkTempVerificationCode(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'number_verify' => 'required|numeric',
            ],
            [
                'number_verify.required'    => Lang::get('auth.require_number_verify'),
                'number_verify.numeric'     => Lang::get('auth.numeric_number_verify'),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->checkTempVerificationCode($user, $data);

    }

    public function changeEmail(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $messages = [
            'email.required'            => Lang::get("auth.require_email"),
            'email.email'               => Lang::get("auth.email_email"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'email'         => 'required|email',
            ],
            $messages
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->changeEmail($request, $user, $data);

    }

    public function checkEmailTempVerificationCode(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'number_verify' => 'required|numeric',
            ],
            [
                'number_verify.required'    => Lang::get('auth.require_number_verify'),
                'number_verify.numeric'     => Lang::get('auth.numeric_number_verify'),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->checkEmailTempVerificationCode($user, $data);

    }

    public function changePassword(Request $request)
    {

        $rules_values["password"]                      = $request["password"];
        $rules_itself["password"]                      = "confirmed";

        $rules_values["password_confirmation"]         = ($request->get("password_confirmation"));
        $rules_itself["password_confirmation"]         ="required_with:password";

        $data = $request->all();
        $user = Auth::user();

        $messages = [
            'old_password.required' => Lang::get("auth.require_old_password"),
            'old_password.min'      => Lang::get("auth.min_old_password"),
            'password.required'     => Lang::get("auth.require_new_password"),
            'password.confirmed'     => Lang::get("auth.password_confirmation"),
            'password.min'          => Lang::get("auth.min_new_password"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'old_password'      => 'required|min:6',
                'password'          => 'required|confirmed|min:6',
                'password_confirmation' => 'required'
            ],
            $messages
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->changePassword($user, $data);

    }

    public function sendSupport(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();

        $messages = [
            'message.required'  => Lang::get("user.require_message"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'message'       => 'required',
                'email'         => 'email'
            ],
            $messages
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->sendSupport($user, $data);

    }

    public function getUserWallet()
    {
        $user = Auth::user();
        return $this->service->getUserWallet($user);

    }

    public function userNotifications()
    {
        $user = Auth::user();
        return $this->service->userNotifications($user);
    }

    public function upcommingSessions()
    {
        $user = Auth::user();
        return $this->service->upcommingSessions($user);
    }

    public function previousSessions()
    {
        $user = Auth::user();
        return $this->service->previousSessions($user);
    }

    public function bookSession(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $messages = [];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'doctor_session_id'      => 'required|numeric',
            ],
            $messages
        );
        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->bookSession($user, $data);
    }

    public function getBooking($booking_id)
    {
        return $this->service->getBooking($booking_id);
    }

    public function apply_promo(Request $request,$booking_id)
    {
        $data = $request->all();
        $messages = [];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'promo_code'      => 'required',
            ],
            $messages
        );
        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->apply_promo($data, $booking_id);
    }

    public function rateDoctor(Request $request,$doctor_id,$session_id)
    {
        $data = $request->all();
        $messages = [];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'rate'      => 'required|numeric|min:1|max:5',
            ],
            $messages
        );
        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->rateDoctor($data, $doctor_id,$session_id);
    }

    public function getNofifications()
    {
        $user = Auth::user();
        return $this->service->getNofifications($user);
    }

    #region video call
    public function session($session_id)
    {
        $appid = "565e8fe5f9834c5a976ea6c06b2503ab";
        $channel_name  = md5("#!@!#!*&*(&" . "sponsor_btm" . "#!@!#!*&*(&" . time() . random_bytes(5));

        $time = time() + 3600;
        $token = RtcTokenBuilder::buildTokenWithUid($appid,'a2d8f40705f44490b39449213ce29837',$channel_name,null,1,$time);
        if (strpos($token, '/') !== false) {
            header("Refresh:0");
        }        return view('front.session',compact('token','channel_name','appid'));
    }

    public function join_video($channel_name,$appid,$token)
    {
        return view("front.video",compact('token','channel_name','appid'));
    }

    public function cancelBooking($session_id)
    {
        return $this->service->cancelBooking($session_id);
    }

    #endregion



}
