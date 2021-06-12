<?php

namespace App\Services\Implementation;

use App\Adapters\IUserAdapter;
use App\Helpers\MessageHandleHelper;
use App\helpers\utility;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RtcTokenBuilder;
use App\Http\Controllers\traits\imagesTrait;
use App\Jobs\send_email;
use App\Jobs\send_push;
use App\models\bookings\booking_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\models\doctors\new_doctors_sessions;
use App\models\doctors\ratings_m;
use App\models\notification_m;
use App\models\promo_code_m;
use App\Notifications\mail\CancelSession;
use App\Notifications\mail\sendVerificationCode;
use App\Notifications\mail\SessionReminder;
use App\Services\IUserService;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class UserService  implements IUserService
{
    use imagesTrait;
    protected $adapter;
    protected $transform;

    /**
     * UserService constructor.
     * @param IUserAdapter $adapter
     * @param MessageHandleHelper $messageHandle
     */
    public function __construct(IUserAdapter $adapter, MessageHandleHelper $messageHandle ,UserTransformer $transform)
    {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;
        $this->transform = $transform;

    }


    function getProfile($user)
    {
        $user_id    = $user->user_id;
        $get_user = $this->adapter->getUserProfile($user_id);

        if(!is_array($get_user) || !count($get_user))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        $get_user = $get_user[0];
        $get_user = $this->transform->transformUserProfile($get_user->toArray());


        return $this->messageHandler->getJsonSuccessResponse("", $get_user);

    }

    function updateProfileImage($request, $user)
    {

        $user_id    = $user->user_id;

        $request["logo_id"] = $this->general_save_img(
            $request,
            $item_id = $user_id,
            "profile_img",
            $new_title = "",
            $new_alt = "",
            $upload_new_img_check = 'on',
            $upload_file_path = "/users",
            $width = 0,
            $height = 0,
            $photo_id_for_edit = $user->logo_id
        );


        $this->adapter->updateUserProfile($request->all(),$user_id);
        $user_data = $this->adapter->getUserProfile($user_id);
       $user_data = $user_data[0];

        $msg = Lang::get("general.updated_successfully");
        $json = [
            'Status'        => 1,
            'Code'          => 201,
            'Message'       => $msg,
            "Data"          => url($user_data->logo_path),
            "Errors"        => null,

        ];

        return response()->json($json, '201');


    }

    function updateProfile($data, $user)
    {

        $user_id    = $user->user_id;
        $user_type = $user->user_type;
        $mobile_number = $data['mobile_number'];
        $email = $data['email'];
        #region check if mobile_number exist same user_type with this mobile_number

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "mobile_number" => $mobile_number,
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id != $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_mobile_number"));
            }

        }

        #endregion


        $data["mobile_number"]  = ltrim($data["mobile_number"], '0');

        #region check valid number

        $full_phone_number = "+".$user->phone_code.$data["mobile_number"];
        $check_valid_number = utility::check_valid_phone($full_phone_number);
        if($check_valid_number["status"] == "error")
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
        }

        #endregion

        #region change email
        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "email"         => $email,
                "user_provider" => "default"
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id != $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_email"));
            }

        }
        #endregion
        $this->adapter->updateUserProfile($data->all(),$user_id);

        $msg = Lang::get("general.updated_successfully");

        return $this->messageHandler->postJsonSuccessResponse($msg,[]);

    }

    function changeMobile($request, $user, $data)
    {


        $user_id        = $user->user_id;
        $user_type      = $data["user_type"];
        $mobile_number  = $data["mobile_number"];

        #region check user
        $check_user = $this->adapter->check_user_exist(
            $cond = [
                "user_id"     => $user_id
            ]
        );
        if($check_user->user_provider != 'default')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));
        }
        #endregion

        #region check if mobile_number exist same user_type with this mobile_number

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "user_type"     => $user_type,
                "mobile_number" => $mobile_number
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id == $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.same_user_mobile"));
            }

            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_mobile_number"));
        }

        #endregion


        $data["mobile_number"]  = ltrim($data["mobile_number"], '0');

        #region check valid number

        $full_phone_number = "+".$user->phone_code.$data["mobile_number"];
        $check_valid_number = utility::check_valid_phone($full_phone_number);
        if($check_valid_number["status"] == "error")
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_valid_mobile_number"));
        }

        #endregion

        $number_verify                  = rand(1000,9999);
        $expire_date  = Carbon::now()->addHour(3);
        $this->adapter->updateUserProfile([
            "temp_mobile_number"    => $data["mobile_number"],
            "verification_code"         => $number_verify,
            "verification_code_expiration" => $expire_date,
        ],$user_id);


        // TODO bk: Send sms with verification code to new mobile number

        $msg = Lang::get("auth.verification_code_is_sent");

        return $this->messageHandler->postJsonSuccessResponse($msg,
            [
                "number_verify" => $number_verify, // TODO bk: Remove it
            ]
        );

    }

    function checkTempVerificationCode($user, $data){

        $user_id        = $user->user_id;
        $user_type      = $data["user_type"];


        if(empty($user->temp_mobile_number))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }

        $mobile_number  = $user->temp_mobile_number;

        #region check if mobile_number exist same user_type with this mobile_number

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "user_type"     => $user_type,
                "mobile_number" => $mobile_number
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id == $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.same_user_mobile"));
            }

            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_mobile_number"));
        }

        #endregion

        $userData = $this->adapter->numberVerification($user->user_id,$data['number_verify']);

        if (isset($userData->user_id)){

            $this->adapter->updateUserProfile([
                "mobile_number"         => $user->temp_mobile_number,
                "temp_mobile_number"    => "",
            ],$user_id);

            $msg = Lang::get("auth.mobile_updated_successfully");

            $user = Auth::user();
            $user = $this->transform->transform($user->toArray());

            return $this->messageHandler->postJsonSuccessResponse($msg,$user);

        } else {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }

    }

    function changeEmail($request, $user, $data)
    {

        $user_id        = $user->user_id;
        $user_type      = $data["user_type"];
        $email          = $data["email"];

        #region check user
        $check_user = $this->adapter->check_user_exist(
            $cond = [
                "user_id"     => $user_id,
                "user_provider" => 'default'

            ]
        );
        if(!is_object($check_user))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));
        }
        #endregion

        #region check if email exist same user_type with this email

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "user_type"     => $user_type,
                "email"         => $email,
                "user_provider" => "default"
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id == $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.same_user_email"));
            }

            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_email"));
        }

        #endregion

        $number_verify          = rand(1000,9999);
        $expire_date  = Carbon::now()->addHour(3);

        $this->adapter->updateUserProfile([
            "temp_email"            => $data["email"],
            "verification_code"         => $number_verify,
            "verification_code_expiration" => $expire_date,
        ],$user_id);

        #region send verification code to new email


        $arr["verification_code"] = $number_verify;
        $check_user->notify((new sendVerificationCode($check_user,$arr)));

        $msg  = Lang::get("auth.verification_code_is_sent_to_email");

        #endregion


        return $this->messageHandler->postJsonSuccessResponse($msg,
            [
                "number_verify" => $number_verify, // TODO bk: Remove it
            ]
        );

    }

    function checkEmailTempVerificationCode($user, $data){

        $user_id        = $user->user_id;
        $user_type      = $data["user_type"];

        if(empty($user->temp_email))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }

        $email          = $user->temp_email;

        #region check if email exist same user_type with this email

        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "user_type"     => $user_type,
                "email"         => $email,
                "user_provider" => "default"
            ]
        );

        if(is_object($check_exist_user))
        {
            if($check_exist_user->user_id == $user_id)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.same_user_email"));
            }

            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.unique_email"));
        }

        #endregion


        $userData = $this->adapter->numberVerification($user->user_id,$data['number_verify']);

        if (isset($userData->user_id)){

            $this->adapter->updateUserProfile([
                "email"                 => $user->temp_email,
                "temp_email"            => "",
            ],$user_id);

            $msg = Lang::get("auth.email_updated_successfully");

            $user = Auth::user();
            $user = $this->transform->transform($user->toArray());

            return $this->messageHandler->postJsonSuccessResponse($msg,$user);

        } else {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.verification_error"));
        }

    }

    function changePassword($user, $data)
    {

        $user_id        = $user->user_id;
        $old_password   = $data["old_password"];
        $password       = $data["password"];

        #region checkUser

        $check_user = $this->adapter->check_user_exist(
            $cond = [
                "user_id"     => $user_id

            ]
        );
        if($check_user->user_provider != 'default')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));
        }
        #endregion


        #region get user

        $get_user = $this->adapter->getUserProfile($user_id);

        if(!is_array($get_user) || !count($get_user))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }
        $get_user = $get_user[0];

        #endregion

        #region check if old password is correct

        if(crypt($old_password, $get_user->password) != $get_user->password){
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.old_password_is_incorrect"));
        }

        $password = bcrypt($password);

        #endregion

        $this->adapter->updateUserProfile([
            "password"   => $password,
        ],$user_id);

        $msg = Lang::get("general.updated_successfully");

        return $this->messageHandler->postJsonSuccessResponse($msg,[]);

    }

    function sendSupport($user, $data)
    {

        $msg_type       = "support";
        $message        = $data["message"];

        $user_id    = 0;
        $name       = (isset($data["name"])?$data["name"]:"");
        $tel        = (isset($data["tel"])?$data["tel"]:"");
        $email        = (isset($data["email"])?$data["email"]:"");
        if(is_object($user))
        {

            $user_id        = $user->user_id;
            $get_user = $this->adapter->getUserProfile($user_id);

            if(!is_array($get_user) || !count($get_user))
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
            }
            $get_user = $get_user[0];

            $name = $get_user->username;
            $tel  = $get_user->mobile_number;
            $email = $get_user->email;
        }

        $msg_arr = [
            "user_id"   => $user_id,
            "msg_type"  => $msg_type,
            "full_name" => $name,
            "phone"     => $tel,
            "message"   => $message,
            "email"    => $email
        ];
        $obj = $this->adapter->sendSupport($msg_arr);

        $get_admin_ids =  $this->adapter->getAdminIds();

        if(is_array($get_admin_ids) && count($get_admin_ids))
        {

            if ($msg_type == "support")
            {
                $not_title = " لقد تم إرسال رسالة إلي الدعم الفني من $name";
            }
            else if ($msg_type == "idea")
            {
                $not_title = " لقد تم إرسال رسالة إقتراح فكرة جديدة للتطبيق من $name";
            }
            else
            {
                $not_title = " لقد تم إرسال رسالة طلب إضافة مطعم جديد من $name";
            }


            utility::send_notification_to_users(
                $get_admin_ids,
                $not_title,
                $not_type = $msg_type,
                $field_id = $obj->id
            );

        }


        $msg = Lang::get("user.support_message_is_sent");
        $arr = [
            "id"           => intval($obj->id),
        ];

        return $this->messageHandler->postJsonSuccessResponse($msg,$arr);

    }

    public function getUserWallet($user)
    {
        $user_id = $user->user_id;
        $user_data = $this->adapter->check_user_exist(
            $cond = [
                "user_id"     => $user_id
            ]
        );
        $result = $this->transform->transformUserWallet($user_data);

        return $this->messageHandler->getJsonSuccessResponse("", $result);


    }

    public function userNotifications($user)
    {
        $user_id    = $user->user_id;
        $check_exist_user = $this->adapter->check_user_exist(
            $cond = [
                "user_id"     => $user_id
            ]
        );

        if(!is_object($check_exist_user))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        $data = $this->adapter->userNotifications($user_id);
        $result = $this->transform->transformUserNotifications($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function upcommingSessions($user)
    {
        $user_id = $user->user_id;
        $data = $this->adapter->upcommingSessions($user_id);
        $result = $this->transform->transformUserSessions($data);


        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function previousSessions($user)
    {
        $user_id = $user->user_id;
        $data = $this->adapter->previousSessions($user_id);
        $result = $this->transform->transformUserSessions($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function bookSession($user,$data)
    {

        $user_id = $user->user_id;
        $data['user_id'] = $user_id;
        $data['session_id'] = $data['doctor_session_id'];
        $data['is_paid']   = 0;
        $data['is_done'] = 0;
        $data['session_date'] = $data['date'];

        $get_session = new_doctors_sessions::where("session_id",$data['session_id'])->whereNull("deleted_at")->first();
        #region check if session is exist
        if(! is_object($get_session))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("This Session Is Not Exist");

        }
        #endregion

        #region check if session is booked
        $check_booking = booking_m::where("session_date",$data['date'])->where("session_id",$data['doctor_session_id'])->first();
        if(is_object($check_booking))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.session_booked"));

        }

        #endregion
        $doctor_id = $get_session->doctor_id;
        $doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $time_from = $get_session->time_from;
        $time_to = $get_session->time_to;
       // $minutes = abs(strtotime($time_from) - strtotime($time_to)) / 60;

        $book = $this->adapter->bookSession($data);

        return $this->messageHandler->getJsonSuccessResponse("", $book);

    }

    public function getBooking($booking_id)
    {
        $get_booking = booking_m::where("book_id",$booking_id)->whereNull("deleted_at")->first();
        #region check if booking is exist
        if(! is_object($get_booking))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("This Booking Is Not Exist");

        }
        #endregion
        $data = $this->adapter->getBooking($booking_id);
        $data = $data[0];
        $result = $this->transform->transformBooking($data->toArray());
        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function apply_promo($data,$booking_id)
    {
        $get_booking = booking_m::where("book_id",$booking_id)->whereNull("deleted_at")->first();
        #region check if booking is exist
        if(! is_object($get_booking))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("This Booking Is Not Exist");

        }
        #endregion

        #region if promo code is valid
        $get_promo = $this->adapter->checkPromoCode($data['promo_code']);
        if(!is_object($get_promo))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.promo_is_not_exist"));
        }

        #endregion

        #region check if promo code is used
        if($get_promo->is_used == 1)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.promo_is_used_before"));

        }
        #endregion

        $discount_value = $get_promo->code_value;
        $price_after_discount = $get_booking->price_after_discount * ($discount_value/100);
        $last_price = $get_booking->price_after_discount - $price_after_discount;
        $get_booking->update([
           "price_after_discount" => $last_price
        ]);

        $get_promo->update([
           "is_used" => 1
        ]);

        return $this->messageHandler->getJsonSuccessResponse("", [
            "new_price" => $last_price
        ]);

    }

    public function rateDoctor($data,$doctor_id,$session_id)
    {
        if(Auth::user()->user_type != 'user')
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.not_allowed"));

        }
        $user_id = Auth::user()->user_id;
        $cond = [
            "new_doctors_sessions.session_id" => $session_id,
            "new_doctors_sessions.doctor_id" => $doctor_id
        ];
        $check_session = new_doctors_sessions::get_new_doctors_sessions($cond)->first();
        if(!is_object($check_session))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("Error");

        }
        /*
        #region check if user is allowed to rate the doctor
        $check = $this->adapter->checkIfUserAllowedToRate($user_id,$doctor_id,$session_id);
        dd($check);
        if(! is_object($check))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.not_allowed_to_rate"));
        }
        #endregion
        */

        #region check if your rated This Doctor Before
        $rating = ratings_m::where("user_id",$user_id)->where("doctor_id",$doctor_id)->where("session_id",$session_id)->first();
        if(is_object($rating))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("general.already_rated"));
        }
        #endregion

        $data['user_id'] = $user_id;
        $data['doctor_id'] = $doctor_id;
        $data['session_id'] = $session_id;
        ratings_m::create($data);
        $avg  = ratings_m::where("doctor_id",$doctor_id)->avg("rate");
        $doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $doctor->update([
            'rating' => $avg
        ]);
        return $this->messageHandler->postJsonSuccessResponse(Lang::get("general.added_successfully"),[]);
    }

    public function getNofifications($user)
    {
        $user_id = $user->user_id;
        $data = $this->adapter->getNofifications($user_id);
        $result = $this->transform->transformNotifications($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function cancelBooking($session_id)
    {
        $cond[] = ["booking.session_id","=",$session_id];
        $booking =  booking_m::get_user_bookings(
            $additional_and_wheres  = $cond, $free_conditions  = "",
            $order_by_col           = "", $order_by_type    = "",
            $limit                  = 0 , $offset           = 0,
            $paginate               = 10 , $return_obj       = "yes"
        );
        $get_session = new_doctors_sessions::where("session_id",$session_id)->first();
        $current_date = time();
        $session_date = strtotime($booking->session_date." ".$booking->time_from);
        if($current_date > $session_date)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("You can not cancel this booking");

        }

        if($booking->is_canceled == 1)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("this booking is already canceled");

        }


        $time = new \DateTime($booking->session_date." ".$booking->time_from);
        $diff = $time->diff(new \DateTime());
        $minutes = ($diff->days * 24 * 60) +
            ($diff->h * 60) + $diff->i;

        if($minutes < (60*24))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("You can not cancel this booking with remaining time less than 24 hours");

        }
        $doctor_id = $get_session->doctor_id;

        $get_doctor = doctors_m::where("doctor_id",$doctor_id)->first();
        $user = User::where("user_id",$booking->user_id)->first();
        $doc = User::where("user_id",$get_doctor->user_id)->first();
        $get_session->update([
            "is_booked" => 0,
        ]);
        $booking->update([
            "is_canceled" => 1

        ]);


        notification_m::create([
                "to_user_id" => $get_doctor->user_id,
                "to_user_type" => "doctor",
                "not_type" => "cancel_session",
                "not_title" => "Your Session with ".$user->username." at ".$booking->time_from." ".$booking->session_date." is canceled"
            ]);


            notification_m::create([
                "to_user_id" => $booking->user_id,
                "to_user_type" => "user",
                "not_type" => "cancel_session",
                "not_title" => "Your Session with Dr ".$booking->full_name." at ".$booking->time_from." ".$booking->session_date." is canceled"
            ]);


            $doc->notify((new CancelSession($doc,$booking->time_from,$booking->session_date)));
        $user->notify((new CancelSession($user,$booking->time_from,$booking->session_date)));
        return $this->messageHandler->postJsonSuccessResponse(Lang::get("general.added_successfully"),[]);

    }

    public function joinSession($session_id)
    {
        $booking = booking_m::where("session_id",$session_id)->first();
        if(!is_object($booking))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("This Booking Is Not Exist");

        }

        if($booking->channel_name == null || $booking->session_token == null)
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("Your Doctor did not start the session yet");

        }else{
            return $this->messageHandler->getJsonSuccessResponse("", [
                "url" => url("/api/session/$session_id/join?channel_name=$booking->channel_name&session_token=$booking->session_token")
            ]);
        }

    }


}
