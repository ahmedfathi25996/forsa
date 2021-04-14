<?php

namespace App\Services\Implementation;

use App\Adapters\IUserAdapter;
use App\Helpers\MessageHandleHelper;
use App\helpers\utility;
use App\Notifications\mail\resetPassword;
use App\Notifications\mail\sendActivationLink;
use App\Notifications\mail\sendVerificationCode;
use App\Services\IAuthService;
use App\Transformers\UserTransformer;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;


class AuthService implements IAuthService {

    use DispatchesJobs;

    protected $adapter;

    public function __construct(IUserAdapter $adapter, MessageHandleHelper $messageHandle, UserTransformer $transform) {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;
        $this->transform= $transform;

    }

    function login($data)
    {

        $field      = trim($data['field']);
        $isEmail    = filter_var($data['field'], FILTER_VALIDATE_EMAIL);

        if($isEmail)
        {
            $data['email']  = $field;

            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"         => $data['email'],
                    "user_provider" => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        else
        {
            $data['username'] = $field;

            $data['username']  = $data['username'];

            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "username"         =>  $data['username'] ,
                    "user_provider"         => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }


        if(is_object($user))
        {
            $this->adapter->revokeToken($user);
        }

        $username_login = false;

        $email_login = false;


        if(isset($data['username']) && !empty($data['username']))
        {
            $username_login = Auth::attempt([
                'username' => $data['username'],
                'password'      => $data['password'],
                'user_provider' => 'default'
            ]);
        }
        else if(isset($data['email']) && !empty($data['email']))
        {
            $email_login = Auth::attempt([
                'email'         => $data['email'],
                'password'      => $data['password'],
                'user_provider' => 'default'
            ]);
        }


        if($username_login || $email_login)
        {
            $user = Auth::user();

            $verificationCode                   = rand(1000,9999);
            $user->verification_code            = $verificationCode;
            $user->verification_code_expiration = Carbon::now()->addHour(3);

            $this->adapter->updateUserObject($user);

            if($user->is_active == 0)
            {
                if($email_login || $username_login)
                {

                    $user->notify((new sendActivationLink($user)));

                    $json = [
                        'Status'        => 1,
                        'Code'          => 402,
                        'Message'       => Lang::get("auth.verification_code_is_sent_to_email"),
                        "number_verify" => $verificationCode, // TODO bk: Remove it
                        "Errors"        => null,
                        "Data"          => null,
                    ];

                    return response()->json($json, 200);

                }
            }


            if(in_array($user->user_type,["admin","dev"]))
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
            }

            $user_id = $user->user_id;
            $user->token = $user->createToken('MyApp')->accessToken;


            $user = $this->transform->transform($user->toArray());

            if (isset($data['token_mobile_push']) && isset($data['device_type'])){
                $this->adapter->pusToken($user_id,$data);
            }

            return $this->messageHandler->postJsonSuccessResponse($ms = Lang::get("auth.success_login"), $user);

        }else {

            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.invalid_login"));

        }

    }

    function updatePushToken($data,$user)
    {
        $this->adapter->pusToken($user->user_id,$data);

        return $this->messageHandler->postJsonSuccessResponse($ms = Lang::get("auth.push_token_updated_successfully"), []);

    }

    function register($data)
    {

        $user_type      = isset($data["user_type"])?$data["user_type"]:"user";
        $username      = isset($data["username"])?$data["username"]:"";
        $email          = isset($data["email"])?$data["email"]:"";
        $city          = isset($data["city"])?$data["city"]:"";
        $mobile_number = isset($data["mobile_number"])?$data["mobile_number"]:"";
        $is_treated_before = isset($data["is_treated_before"])?$data["is_treated_before"]:0;
        $diagnosis = isset($data["diagnosis"])?$data["diagnosis"]:"";
        $forsa_tanya_knowing = isset($data["forsa_tanya_knowing"])?$data["forsa_tanya_knowing"]:"";
        $age = isset($data["age"])?$data["age"]:"";
        $phone_code     = isset($data["phone_code"])?$data["phone_code"]:"20";


        if($user_type == "user" && empty($username))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.require_username"));
        }
        $check_username = User::where("username",$data['username'])->where("user_type",'user')->first();
        if(is_object($check_username))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_username"));
        }



        if(!empty($email))
        {

            #region check if email exist same user_type with this email

            $check_exist_user = $this->adapter->check_user_exist(
                $cond = [
                    "user_type"     => $user_type,
                    "email"         => $email
                ]
            );

            if(is_object($check_exist_user))
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_email"));
            }

            #endregion

        }

        $input_data["mobile_number"]  = $mobile_number;

        #region check valid number

        $full_phone_number = "+20".$data["mobile_number"];
        $check_valid_number = utility::check_valid_phone($full_phone_number);
        if($check_valid_number["status"] == "error")
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
        }

        #endregion


        $input_data["phone_code"] = "$phone_code";

        $input_data['username'] = $username;
        $input_data['email']     = $email;

        $input_data["password"] = bcrypt($data["password"]);

        $input_data["is_active"]                    = 1;
        $number_verif                               = rand(1000,9999);
        $input_data["verification_code"]            = $number_verif;
        $input_data["verification_code_expiration"] = Carbon::now()->addHour(3);

        $user_code                      = md5("#!@!#!*&*(&" . "sponsor_btm" . "#!@!#!*&*(&" . time() . random_bytes(5));
        $input_data['user_code']        = $user_code;
        $input_data['user_type']        = $user_type;
        $input_data['city'] =$city;
        $input_data['is_treated_before'] =$is_treated_before;
        $input_data['diagnosis'] =$diagnosis;
        $input_data['forsa_tanya_knowing'] =$forsa_tanya_knowing;
        $input_data['age'] =$age;
        $user = $this->adapter->createUser($input_data);


        if(!empty($email))
        {
            $user->notify((new sendActivationLink($user)));
            /*
            $url = url("/api/activation/$user->user_id");
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: Forsa Tanya <mail@sam-construction.com>';
            $message = '<html><body>';
            $message .= '<table>';
            $message .= '<td>';
            $message .= '<h1>Welcome</h1>';
            $message .= '<p>PLease Click To link To Activate Your Account </p>'.' '.$url;
            $message .= '<p>Cheers';
            $message .= '<br> Forsa Tanya Team';
            $message .= '</p>';
            $message .= '</td>';
            $message .= '</table>';
            $message .= '</body>';
            $message .= '</html>';

            mail($user->email,"Activation Link",$message,implode("\r\n",$headers));
*/
            $msg  = Lang::get("auth.verification_code_is_sent_to_email");

        }


        return $this->messageHandler->postJsonSuccessResponse($msg);

    }

    function sendVerificationCode($data)
    {


        $field      = trim($data['field']);//  may be mobile or email
        $phone_code = (isset($data["phone_code"])?$data["phone_code"]:"20");

        $isEmail = filter_var($field, FILTER_VALIDATE_EMAIL);

        if ($isEmail)
        {
            $user = $this->adapter->getUserTypeEmailOrTemp($field);

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));

        }
        else
        {
            $field  = ltrim($field, '0');

            #region check valid number

            $full_phone_number = "+".$phone_code.$field;
            $check_valid_number = utility::check_valid_phone($full_phone_number);
            if($check_valid_number["status"] == "error")
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
            }

            #endregion

            $user = $this->adapter->getUserTypeNumberOrTemp($field);

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $verificationCode = rand(1000,9999);

        $user->verification_code = $verificationCode;
        $user->verification_code_expiration = Carbon::now()->addHour(3);

        $this->adapter->updateUserObject($user);

        if (!empty($user->email))
        {
            $arr["verification_code"] = $verificationCode;
            $user->notify((new sendVerificationCode($user,$arr)));

        }

        if (!empty($user->mobile_number)){

            $sms_body = "The verification code is $verificationCode";
            //$this->dispatch(new send_sms($sms_body, $user->mobile_number));

        }

        $json = [
            'Status'        => 1,
            'Code'          => 200,
            'Message'       => Lang::get("auth.resend_verification_code"),
            "number_verify" => $verificationCode, // TODO bk: Remove it
            "Errors"        => null,
            "Data"          => null,
        ];

        return response()->json($json, '200');

    }

    public function passwordForget($data)
    {

        $field = trim($data['field']);//  may be mobile or email

        $isEmail        = filter_var($field, FILTER_VALIDATE_EMAIL);

        if($isEmail)
        {
            $data['email']  = $field;
            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"         => $data['email'],
                    "user_provider" => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));


            $arr["user_code"] = $user->user_code;
            $user->notify((new resetPassword($user,$arr)));

            $ms = Lang::get("auth.email_is_sent_to_reset_password");
        }
        else
        {

            $data['number'] = $field;

            $data['number']  = ltrim($data['number'], '0');

            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "mobile_number"         => $data['number'],
                    "user_provider"         => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));


            $new_password = rand(100000,999999);

            $full_phone_number = "+20".$field;
            $check_valid_number = utility::check_valid_phone($full_phone_number);
            if($check_valid_number["status"] == "error")
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
            }

            $update_data['password'] = bcrypt($new_password);
            $this->adapter->updateUserProfile($update_data,$user->user_id);

            $sms_body = "Your new password is $new_password";
            //$this->dispatch(new send_sms($sms_body, $data['number']));

            $ms = Lang::get("auth.new_password_is_sent_to_phone");

        }


        return $this->messageHandler->postJsonSuccessResponse($ms, []);

    }

    function numberVerification($data){

        $phone_code     = isset($data["phone_code"])?($data["phone_code"]):"20";
        $field          = (isset($data["field"])?($data["field"]):"");
        $field          = trim($field);

        $isEmail        = filter_var($field, FILTER_VALIDATE_EMAIL);


        if($isEmail)
        {
            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"                 => $field,
                    "user_provider"         => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        else
        {
            $field  = ltrim($field, '0');

            #region check valid number

            $full_phone_number = "+".$phone_code.$field;
            $check_valid_number = utility::check_valid_phone($full_phone_number);
            if($check_valid_number["status"] == "error")
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
            }

            #endregion


            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "mobile_number"    => $field,
                    "user_provider"    => "default"
                ]
            );

            #region check user
            if($user->user_provider != 'default')
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));
            }
            #endregion

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $userData = $this->adapter->numberVerification($user->user_id,$data['number_verify']);

        if (isset($userData->user_id)){
            Auth::loginUsingId($userData->user_id);

            $user = Auth::user();

            $user->token = $user->createToken('MyApp')->accessToken;
            $user = $this->transform->transform($user->toArray());

            $msg = Lang::get("auth.verification_successfully");

            return $this->messageHandler->postJsonSuccessResponse($msg,$user);

        } else {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }
    }

    function checkVerificationCode($data){

        $phone_code     = (isset($data["phone_code"])?$data["phone_code"]:"20");


        if(isset($data['email']) && !empty($data['email']))
        {
            $user = $this->adapter->check_user_exist(
                $cond = [
                    "email"     =>  $data['email'],
                    "user_provider" => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        else if(isset($data['mobile_number']) && !empty($data['mobile_number']))
        {
            $data['mobile_number']  = ltrim($data['mobile_number'], '0');

            #region check valid number

            $full_phone_number = "+".$phone_code.$data['mobile_number'];
            $check_valid_number = utility::check_valid_phone($full_phone_number);
            if($check_valid_number["status"] == "error")
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
            }

            #endregion

            $user = $this->adapter->check_user_exist(
                $cond = [
                    "mobile_number"     =>  $data['mobile_number'],
                    "user_provider"     => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }


        $userData = $this->adapter->numberVerification($user->user_id,$data['number_verify']);

        if (isset($userData->user_id)){

            $msg = Lang::get("auth.verification_successfully");

            return $this->messageHandler->postJsonSuccessResponse($msg,[]);

        } else {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }

    }

    public function resetPassword($data)
    {

        if(isset($data['email']) && !empty($data['email']))
        {
            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"                 => $data['email'],
                    "user_provider"         => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        else if(isset($data['mobile_number']) && !empty($data['mobile_number']))
        {
            $data['mobile_number']  = ltrim($data['mobile_number'], '0');

            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "mobile_number"                  => $data['mobile_number'],
                    "user_provider"                  => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $update_data['password'] = bcrypt($data['password']);

        $this->adapter->updateUserProfile($update_data,$user->user_id);

        return $this->messageHandler->postJsonSuccessResponse($ms = Lang::get("auth.password_is_reset"), []);

    }

    public function resetPasswordByEmail($data)
    {

        if(isset($data['email']) && !empty($data['email']))
        {
            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"           => $data['email'],
                    "user_provider"   => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        else if(isset($data['mobile_number']) && !empty($data['mobile_number']))
        {
            $data['mobile_number']  = ltrim($data['mobile_number'], '0');

            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "mobile_number"      => $data['mobile_number'],
                    "user_provider"      => "default"
                ]
            );

            if (!$user)
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $arr["user_code"] = $user->user_code;
        $user->notify((new resetPassword($user,$arr)));

        return $this->messageHandler->postJsonSuccessResponse($ms = Lang::get("auth.email_is_sent_to_reset_password"), []);

    }

    function logout($request)
    {
        $userTokens = Auth::user()->tokens;

        foreach($userTokens as $token) {

            $token->revoke();
        }

        $msg = Lang::get("auth.is_logged_out");

        return $this->messageHandler->postJsonSuccessResponse($msg,[]);

    }

    function socialLogin($data)
    {
        $data['password']              = bcrypt('123456');
        $data['is_active']             = 1;
        $data['is_verified']           = 1;
        $data['phone_code']            = isset($data["phone_code"])?$data["phone_code"]:"20";

        if(isset($data['mobile_number']) && !empty($data['mobile_number']))
        {
            $data['mobile_number']  = ltrim($data['mobile_number'], '0');
        }
        if($data['user_provider'] == 'apple')
        {
            $user = $this->adapter->check_user_exist(
                $cond = [
                    "social_id"         => $data['social_id'],
                    "user_provider"     => $data['user_provider']
                ]
            );
        }
        else{
            $user           = $this->adapter->check_user_exist(
                $cond = [
                    "email"         => $data['email'],
                    "user_provider" => $data['user_provider']
                ]
            );
        }



        if(!is_object($user))
       {
           $user_code          = md5("#!@!#!*&*(&" . "sponsor_btm" . "#!@!#!*&*(&" . time() . random_bytes(5));
           $data['user_code']        = $user_code;

           $user = $this->adapter->createUser($data);

       }

        if(isset($data['email']) && !empty($data['email']))
        {
            $user = Auth::attempt([
                'email'         => $user->email,
                'password'      => '123456',
                'user_provider' => $user->user_provider
            ]);

        }

        $user = Auth::user();

        if(in_array($user->user_type,["admin","dev"]))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $user_id = $user->user_id;
        $user->token = $user->createToken('MyApp')->accessToken;

        $user = $this->transform->transform($user->toArray());

        if (isset($data['token_mobile_push']) && isset($data['device_type'])){
            $this->adapter->pusToken($user_id,$data);
        }

        return $this->messageHandler->postJsonSuccessResponse($ms = Lang::get("auth.success_login"), $user);

    }

    function showSocialAuth()
    {
        return $this->messageHandler->getJsonSuccessResponse("", [
            "show_social_auth" => true
        ]);
    }

    public function activation(Request $request, $user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        $user->update([
            "is_active" => 1
        ]);
        return Redirect::to("/");
    }

}
