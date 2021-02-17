<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\doctors\doctors_m;
use App\models\doctors\doctors_specialites_m;
use App\models\doctors\doctors_translate_m;
use App\models\orders\orders_m;
use App\models\specialites\specialites_m;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("العملاء");

            return $next($request);
        });

    }

    public function index()
    {
        $cond = [];
        $cond[] = ["users.user_type" ,"=", "user"];
        $this->data["results"]      = User::get_users_dashboard(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "",
            $order_by_type          = "asc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 10
        );

        return view("admin.subviews.users.show", $this->data);
    }

    public function getClient($user_id)
    {
        $user_id   = intval(clean($user_id));
        $cond       = [];
        $cond[]     = ["users.user_id","=",$user_id];
        $item_data  = User::get_users_dashboard(
            $additional_and_wheres = $cond,
            $free_conditions       = "users.user_type = 'user'"
        )->all();
        abort_if((!count($item_data)),404);

        $item_data                              = $item_data[0];
        $this->data["item_data"]                = $item_data;
        return view("admin.subviews.users.profile",$this->data);
    }

    

    public function delete(Request $request){

        $item_id        = intval(clean($request->get("item_id",0)));

        $this->general_remove_item($request,'App\User');
    }

    

}
