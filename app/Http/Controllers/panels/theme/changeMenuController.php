<?php

namespace App\Http\Controllers\panels\theme;

use App\Http\Controllers\adminBaseController;

class changeMenuController extends adminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($menu_display)
    {

        $menu_display = ($menu_display);

        session([
            'menu_display' => $menu_display
        ]);

        return redirect()->back();

    }

}
