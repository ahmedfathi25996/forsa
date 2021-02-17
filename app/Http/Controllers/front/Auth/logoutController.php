<?php

namespace App\Http\Controllers\front\Auth;

use App\Http\Controllers\frontBaseController;
use Config;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class logoutController extends frontBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::logout();
        return Redirect::to('/')->with(
            [

            ]
        )->send();
    }


}
