<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\orders\orders_m;
use App\models\transactions_m;
use Illuminate\Http\Request;

class transactionsController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("التحويلات");

            return $next($request);
        });

    }

    public function index(Request $request)
    {

        $cond             = [];
        $from             = clean($request->get('from',''));
        $to               = clean($request->get('to',''));
        $transaction_type = clean($request->get("transaction_type",''));

        if(!empty($from))
        {
            $cond[]     = ["transactions.created_at",">=",$from];
        }

        if(!empty($to))
        {
            $cond[]     = ["transactions.created_at","<=",$to];
        }
        if(!empty($transaction_type))
        {
            $cond[]     = ["transactions.transaction_type","=",$transaction_type];
        }

        $this->data["results"]      = transactions_m::get_transactions(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "transactions.transaction_id",
            $order_by_type          = "desc",
            $limit                  = 0 ,
            $offset                 = 0,
            $paginate               = 20
        );

        $this->data["search_data"] = (object)clean($request->all());

        return view("admin.subviews.transactions.show", $this->data);
    }

    public function delete(Request $request,$order_id){

        $get_order = orders_m::find($order_id);
        if(is_object($get_order))
        {

            $output["deleted"] = "<div class='alert alert-danger'>لا يمكن المسح لوجود طلب مرتبطه به !</div>";
            echo json_encode($output);
            return;
        }
       $this->general_remove_item($request,'App\models\transactions_m');
    }




}
