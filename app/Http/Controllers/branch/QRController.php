<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\branches\branch_m;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("QR Code");

            return $next($request);
        });

    }

    public function index()
    {
        $branch    = branch_m::where("user_id", Auth::user()->user_id)->first();
        $branch_id = $branch->branch_id;

        $this->data["results"] = QrCode::size(400)->generate($branch_id);

        return view("branch.subviews.qrcode.show", $this->data);
    }


}