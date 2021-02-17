<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\dashboardTrait;
use App\models\branches\branch_m;
use App\models\langs_m;
use App\models\notification_m;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Facades\Redirect;


class branchBaseController extends Controller
{

    use dashboardTrait;

    public function __construct()
    {

        if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        {
            ob_start("ob_gzhandler");
        }

        parent::__construct();

        $this->data["dark_mode"]    = config('dark_mode');
        $this->data["lang_id"]      = config('lang_id');
        $this->getNotificationsHeader();

    }

    public function getAllLangs()
    {
        $all_langs                  = langs_m::get_langs();
        $this->data["all_langs"]    = $all_langs;

        if(!is_array($all_langs->all()) || !count($all_langs->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد للغات حاليا في النظام أضف اولا !!</div>";

            return Redirect::to('admin/dashboard')->with([
                "msg" => $this->data["success"]
            ])->send();
        }

    }



    public function getNotificationsHeader()
    {
        $get_notifications = notification_m::get_notifications(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "notifications.not_id",
            $order_by_type          = "desc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 5

        );
        $get_notifications = collect($get_notifications->all())->groupBy('notification_date')->all();
        $this->data['notifications_header'] = $get_notifications;
        $this->data['count_notifications'] = notification_m::where('is_seen',0)->count();

    }


}
