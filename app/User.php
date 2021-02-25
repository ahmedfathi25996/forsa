<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey   = 'user_id';
    protected $table        = "users";
    protected $dates        = ["deleted_at"];
    protected $fillable     =
    [
        'user_code', 'user_type', 'logo_id','first_name','last_name','username','email','temp_email',
        'user_provider','social_id',
        'email_verified_at','password','remember_token','phone_code','mobile_number','temp_mobile_number','verification_code',
        'verification_code_expiration','is_verified','is_active','user_wallet','ip_address',
        'country','timezone','last_login_date','display_lang_id','serial_number','referral_code','plan_id','plan_expire_date',
        'user_wallet','user_points','offers_count','profile_path','is_treated_before','city','diagnosis','forsa_tanya_knowing','age','gender','temp_username','temp_age',"temp_gender"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden       =
    [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts        =
    [
        'email_verified_at' => 'datetime',
        'user_wallet'       => 'float',
    ];

    public static $default_lang_id = 1;
    static function get_users(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0, $return_obj        = "no"
    )
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = User::select(DB::raw("
            users.*,
            users.created_at as 'user_creation_date',
            logo.path as 'logo_path',
            logo.id as 'logo_img_id'
        "))
            ->leftJoin("attachments as logo",function ($join){
                $join->on("users.logo_id","=","logo.id")
                    ->whereNull("logo.deleted_at");

            }) ;

        if (is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $results        = $results->where($additional_and_wheres);
        }

        if (!empty($free_conditions))
        {
            $results        = $results->whereRaw($free_conditions);
        }

        if (!empty($order_by_col))
        {
            $results        = $results->orderBy("$order_by_col","$order_by_type");
        }

        if ($limit > 0)
        {
            $results        = $results->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
            $results        = $results->paginate($paginate);
        }
        else{
            $results        = $results->get();
        }

        if ($return_obj != "no")
        {

            $results    = $results->first();

        }

        return $results;

    }


    static function get_users_dashboard(
        $additional_and_wheres  = [], $free_conditions  = "",
        $order_by_col           = "", $order_by_type    = "",
        $limit                  = 0 , $offset           = 0,
        $paginate               = 0, $return_obj        = "no"
    )
    {
        $default_lang_id        = Config('lang_id');
        if (!isset($default_lang_id) || !is_numeric($default_lang_id) || $default_lang_id == 0)
            $default_lang_id    =  self::$default_lang_id;

        $results = User::select(DB::raw("
            users.*,
            users.created_at as 'user_creation_date',
            logo.path as 'logo_path',
            logo.id as 'logo_img_id'
        "))
            ->leftJoin("attachments as logo",function ($join){
                $join->on("users.logo_id","=","logo.id")
                    ->whereNull("logo.deleted_at");

            }) ;

        if (is_array($additional_and_wheres) && count($additional_and_wheres))
        {
            $results        = $results->where($additional_and_wheres);
        }

        if (!empty($free_conditions))
        {
            $results        = $results->whereRaw($free_conditions);
        }

        if (!empty($order_by_col))
        {
            $results        = $results->orderBy("$order_by_col","$order_by_type");
        }

        if ($limit > 0)
        {
            $results        = $results->limit($limit)->offset($offset)->get();
        }
        else if ($paginate > 0)
        {
            $results        = $results->paginate($paginate);
        }
        else{
            $results        = $results->get();
        }

        if ($return_obj != "no")
        {

            $results    = $results->first();

        }

        return $results;

    }




    public static function check_user($serial_number)
    {
        $user = User::where('serial_number',$serial_number)
            ->where('is_active',1)
            ->where('user_type','user')->first();
        return $user;
    }

    static public function get_user_token($user_id)
    {
        return User::select("users.user_id","users.full_name","push_tokens.id","push_tokens.device_type")->
        join("push_tokens","push_tokens.user_id","users.user_id")->
        where("users.user_id",$user_id)->
        whereNull("users.deleted_at")->
        whereNull("token_push.deleted_at")->
        get()->toArray();
    }

    static public function get_users_tokens($device_type = '',$offset = null,$limit = null)
    {
        $users_token =  User::select("users.user_id","users.full_name","push_tokens.id","push_tokens.push_token","push_tokens.device_type")->
        join("push_tokens","push_tokens.user_id","users.user_id")->
        whereNull("users.deleted_at")->
        whereNull("push_tokens.deleted_at");

        if (!empty($device_type) && $device_type != '' && $device_type != 'all'){
            $users_token = $users_token->where('push_tokens.device_type',$device_type);
        }

        if (isset($offset) && !empty($offset)){
            $users_token = $users_token->offset($offset);
        }

        if (isset($limit) && !empty($limit)){
            $users_token = $users_token->limit($limit);
        }

        return  $users_token->get()->toArray();
    }








}
