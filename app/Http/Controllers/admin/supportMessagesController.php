<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\support_messages_m;
use Illuminate\Http\Request;

class supportMessagesController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle(" رسائل الدعم");

            return $next($request);
        });

    }

    public function index(Request $request)
    {

        $this->data["request_data"] = (object)$request->all();

        $cond = [];
        $from = $request->get('from');
        $to   = ($request->get('to'));
        if(isset($from) && !empty($from))
        {
            $cond[]     = ["support_messages.created_at",">=",$from];
        }

        if(isset($to) && !empty($to))
        {
            $cond[]     = ["support_messages.created_at","<=",$to];
        }
        $this->data["results"]      = support_messages_m::get_support_messages(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "support_messages.id",
            $order_by_type          = "desc",
             $limit                 = 0 ,
            $offset                 = 0,
            $paginate               = 20
        );
        return view('admin.subviews.support_messages.show',$this->data);
    }



    public function seen_support_messages(Request $request)
    {
        $message            = support_messages_m::where('id',$request->get('id'))->first();
        $message->is_seen   = 1;
        $message->save();
        return $message;
    }



    public function delete(Request $request)
    {
        $this->general_remove_item($request,'App\models\support_messages_m');
    }

}
