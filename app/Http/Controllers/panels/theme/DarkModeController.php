<?php

namespace App\Http\Controllers\panels\theme;

use App\Http\Controllers\adminBaseController;
use Illuminate\Http\Request;

class DarkModeController extends adminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $dark_mode = $request->get('dark_mode','off');
        $dark_mode = clean($dark_mode);

        session([
            'dark_mode' => $dark_mode
        ]);

    }

}
