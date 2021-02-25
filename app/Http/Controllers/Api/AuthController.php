<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Http\Controllers\Controller;
use App\Services\IAuthService;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends api_controller
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
    public function __construct(IAuthService $service, ValidationHelper $validator) {

        $this->service = $service;
        $this->validator = $validator;

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){


        $data = $request->all();

        $messages = [
            'email.required'            => Lang::get("auth.email_is_required"),
            'email.email'               => Lang::get("auth.email_is_email"),
            'username.required'        => Lang::get("auth.require_username"),
            'password.required'         => Lang::get("auth.require_password"),
            'password.min'              => Lang::get("auth.min_password"),
            'user_type.required'        => Lang::get("auth.require_user_type"),
            'user_type.in'              => Lang::get("auth.in_user_type"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $data,
            [
                'username'      => 'required',
                'email'          => 'required|email',
                'password'       => 'required|confirmed|min:6',
                'password_confirmation' => 'required',
                "user_type"      => 'required|in:user',
                "city"           => 'required',
                "is_treated_before" => "required",
                "mobile_number"   => "required|unique:users",
                "age"              => "required|numeric",
                "gender"            => "required|in:male,female,prefer_not_to_say"

            ],
            $messages
        );


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->register($data);

    }

    public function login(Request $request){


        $data = $request->all();

        $messages = [
            'field.required'     => Lang::get("auth.require_field"),
            'password.required'  => Lang::get("auth.require_password"),
            'user_type.required' => Lang::get("auth.require_user_type"),
            'user_type.in'       => Lang::get("auth.in_user_type"),
        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'field'       => 'required',
                'password'    => 'required',
                "user_type"   => 'required|in:user,doctor'
            ],
            $messages );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->login($data);

    }

    public function sendVerificationCode(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'field'         => 'required',
                'user_type'     => 'required|in:user,doctor',
            ],
            [
                'field.required'      => Lang::get('auth.require_field'),
                'user_type.required'  => Lang::get("auth.require_user_type"),
                'user_type.in'        => Lang::get("auth.in_user_type"),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->sendVerificationCode($data);
    }

    public function passwordForget(Request $request)
    {

        $data = $request->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'field'            => 'required',
                "user_type"        => 'required|in:user,doctor'
            ],
            [
                'field.required'     => Lang::get('auth.require_field'),
                'user_type.required' => Lang::get("auth.require_user_type"),
                'user_type.in'       => Lang::get("auth.in_user_type"),

            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->passwordForget($data);

    }

    public function updatePushToken(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [

                'token_mobile_push' => 'required',
                'device_type' => 'required|in:ios,android',
            ]);

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        $data['app_version'] = $request->headers->get('App-Version','');
        $data['device_name'] = $request->headers->get('Device-Name','');
        $data['device_os_version'] = $request->headers->get('Device-OS-Version','');
        $data['device_udid'] = $request->headers->get('Device-UDID','');


        return $this->service->updatePushToken($data,$user);

    }

    public function numberVerification(Request $request)
    {

        $data = $request->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'field'         => 'required',
                'number_verify' => 'required|numeric',
                'user_type'     => 'required|in:user',
            ],
            [
                'field.required'            => Lang::get('auth.require_field'),
                'number_verify.required'    => Lang::get('auth.require_number_verify'),
                'number_verify.numeric'     => Lang::get('auth.numeric_number_verify'),
                'user_type.required'        => Lang::get("auth.require_user_type"),
                'user_type.in'              => Lang::get("auth.in_user_type"),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->numberVerification($data);

    }

    public function checkVerificationCode(Request $request)
    {

        $data = $request->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'mobile_number' => 'required|numeric|digits:9',
                'number_verify' => 'required|numeric',
                'user_type'     => 'required|in:user',
            ],
            [
                'mobile_number.required'    => Lang::get('auth.require_mobile_number'),
                'mobile_number.numeric'     => Lang::get('auth.numeric_mobile_number'),
                'mobile_number.digits'      => Lang::get("auth.digits_mobile_number"),
                'number_verify.required'    => Lang::get('auth.require_number_verify'),
                'number_verify.numeric'     => Lang::get('auth.numeric_number_verify'),
                'user_type.required'        => Lang::get("auth.require_user_type"),
                'user_type.in'              => Lang::get("auth.in_user_type"),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->checkVerificationCode($data);

    }

    public function resetPassword(Request $request)
    {

        $data = $request->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'mobile_number' => 'required|numeric|digits:9',
                'password'      => 'required|min:6',
                'user_type'     => 'required|in:user',
            ],
            [
                'mobile_number.required'    => Lang::get('auth.require_mobile_number'),
                'mobile_number.numeric'     => Lang::get('auth.numeric_mobile_number'),
                'mobile_number.digits'      => Lang::get("auth.digits_mobile_number"),
                'password.required'         => Lang::get("auth.require_password"),
                'password.min'              => Lang::get("auth.min_password"),
                'user_type.required'        => Lang::get("auth.require_user_type"),
                'user_type.in'              => Lang::get("auth.in_user_type"),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->resetPassword($data);

    }

    public function resetPasswordByEmail(Request $request)
    {

        $data = $request->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'user_type'     => 'required|in:user,doctor',
                'email'         => 'required|required|email',
            ],
            [
                'user_type.required'        => Lang::get("auth.require_user_type"),
                'user_type.in'              => Lang::get("auth.in_user_type"),
                'email.required'            => Lang::get("auth.email_is_required"),
                'email.email'               => Lang::get("auth.email_is_email"),
            ]
        );

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->resetPasswordByEmail($data);

    }

    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }

    public function sendVerification(Request $request)
    {
        $user = Auth::user();
        return $this->service->sendVerification($user->mobile_number);
    }

    public function checkVerification(Request $request)
    {
        $data = $request->all();



        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'number_verify' => 'required|numeric',
            ]);

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->checkVerification($data, Auth::user());
    }

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else{
            return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }

    public function showSocialAuth()
    {
        return $this->service->showSocialAuth();
    }

    public function activation(Request $request,$user_id)
    {
        return $this->service->activation($request,$user_id);
    }


}
