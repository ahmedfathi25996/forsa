<?php

namespace App\Http\Controllers\panels\theme;

use App\Http\Controllers\adminBaseController;

class changeDirectionController extends adminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($locale)
    {

        $locale = ($locale);

        session([
            'locale' => $locale
        ]);

        return redirect()->back();

    }

}
