<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;

class dashboardController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

    }

    public function index()
    {
        $this->setMetaTitle("لوحة التحكم");


        return view("branch.subviews.index", $this->data);
    }



}
