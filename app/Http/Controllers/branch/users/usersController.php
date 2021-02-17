<?php

namespace App\Http\Controllers\branch\users;

use App\Http\Controllers\adminBaseController;
use App\models\address\user_address_m;
use App\models\orders\orders_m;
use App\User;

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


        $this->data["results"]      = User::get_users(
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
        $user_id   = intval(clean($user_id));
        $this->getUserAddress($user_id);
        $cond       = [];
        $cond[]     = ["users.user_id","=",$user_id];
        $item_data  = User::get_users(
            $additional_and_wheres = $cond,
            $free_conditions       = "users.user_type = 'user'"
        )->all();
        abort_if((!count($item_data)),404);

        $item_data                              = $item_data[0];
        $this->data["item_data"]                = $item_data;
        $this->data["total_orders"] = orders_m::where('user_id',$user_id)->whereNull('orders.deleted_at')->count();
        return view("admin.subviews.users.profile",$this->data);
    }

    private function getUserAddress($user_id)
    {
        $cond       = [];
        $cond[]     = ["user_address.user_id","=",$user_id];
        $this->data["user_address"] = user_address_m::get_user_address(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "user_address.address_id",
            $order_by_type          = "desc"
        );
    }

}
