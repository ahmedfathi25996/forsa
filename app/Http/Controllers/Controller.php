<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\{imagesTrait};
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;

use Illuminate\Support\Facades\Auth;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,
        imagesTrait; // our custom traits

    public $data                = [];
    public $current_user_data   = [];
    public $user_id             = 1;
    public $lang_id             = 1;
    public $api_success         = 1;
    public $api_error           = 0;

    public function __construct()
    {

        $this->checkLoggedUser();

        $this->generalSettings();

    }

    public function checkLoggedUser()
    {

        $this->middleware(function ($request, $next) {
            $current_user = Auth::user();
            $this->data["current_user"] = null;

            if (is_object($current_user))
            {
                $cond =
                [
                    ["users.user_id","=",$current_user->user_id]
                ];
                $current_user = User::get_users(
                    $additional_and_wheres = $cond, $free_conditions = "",
                    $order_by_col = "",$order_by_type = "" ,
                    $limit = 0 , $offset = 0 , $paginate = 0,$return_obj="yes"
                );

                if (is_object($current_user))
                {
                    $this->data["current_user"] = $current_user;
                    $this->current_user_data    = $current_user;
                    $this->user_id              = $current_user->user_id;
                }

            }

            return $next($request);
        });

    }

    public function generalSettings()
    {

        $this->middleware(function ($request, $next) {

            $app_name = config('settings_arr')['name'];

            $this->data["meta_title"]       = $app_name;
            $this->data["meta_desc"]        = $app_name;
            $this->data["meta_keywords"]    = $app_name;

            define('site_data',
                [
                    'name'      => $app_name,
                    'logo_path' => config('settings_arr')['logo'],
                    'icon_path' => config('settings_arr')['icon']
                ]
            );

            define('settings_arr', config('settings_arr'));

            return $next($request);
        });


    }

}
