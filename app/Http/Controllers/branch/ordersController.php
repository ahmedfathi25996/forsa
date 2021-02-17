<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\branches\branch_m;
use App\models\branches\branches_offers_m;
use App\models\branches\offers\offer_m;
use App\models\orders\orders_m;
use App\models\plans\plan_m;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ordersController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الطلبات");

            return $next($request);
        });

    }

    public function index()
    {
        $branch                  = branch_m::where("user_id", Auth::user()->user_id)->first();
        $branch_id               = $branch->branch_id;
        $cond                    = [];
        $cond[]                  = ["orders.branch_id", "=", $branch_id];
        $this->data['branch_id'] = $branch_id;

        $this->data["results"]   = orders_m::get_orders(
            $additional_and_wheres = $cond,
            $free_conditions       = "",
            $order_by_col          = "",
            $order_by_type         = "asc"
        );

        return view("branch.subviews.orders.show", $this->data);
    }

    public function save(Request $request, $order_id = null)
    {
        $this->data["item_data"]  = "";
        $branch                   = branch_m::where("user_id", Auth::user()->user_id)->first();
        $branch_id                = $branch->branch_id;

        $this->getOffers($branch_id);


        if ($order_id != null)
        {

            $order_id   = intval(clean($order_id));

            $cond       = [];
            $cond[]     = ["orders.order_id","=",$order_id];
            $item_data  = orders_m::get_orders(
                $additional_and_wheres  = $cond, $free_conditions   = "",
                $order_by_col           = "", $order_by_type        = "",
                $limit                  = 0 , $offset               = 0,
                $paginate               = 0 , $return_obj           = "yes"
            );

            abort_if((!is_object($item_data)),404);

            $this->data["item_data"]                   = $item_data;

        }

        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $input_data = $request->all();

                #region check if user exist
                $user_data = User::check_user($input_data['serial_number']);
                if (!is_object($user_data)) {
                    $this->data["success"] = "<div class='alert alert-danger'> هذا المستخدم غير موجود</div>";
                    return Redirect::to("branch/orders/save")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                #endregion


                #region check if user plan expired
                $expire_plan_date = $user_data->plan_expire_date;
                $now = Carbon::now();

                if ($now >= $expire_plan_date) {
                    $this->data["success"] = "<div class='alert alert-danger'> لقد تم انتهاء الصلاحية لخطة هذا المستخدم</div>";
                    return Redirect::to("branch/orders/save")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }

                #endregion


                #region check offers count for the user
                $plan = plan_m::get_plan($user_data->plan_id);
                if ($plan->offers_number > 0) {
                    if ($user_data->offers_count == 0) {
                        $this->data["success"] = "<div class='alert alert-danger'> لقد تم انتهاء عدد العروض الخاصة بهذا المستخدم</div>";
                        return Redirect::to("branch/orders/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                #endregion


                #region check if the offer is allowed for the user plan
                $get_offer = offer_m::get_offer($request['offer_id']);
                if($plan->is_basic_plan == 1 )
                {
                    if($get_offer->offer_allowed_to == 'paid')
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> هذا العرض غير متاح لعضوية هذا المستخدم</div>";
                        return Redirect::to("branch/orders/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                #endregion


                #region check if the offer exist
                $branch_offer_data = branches_offers_m::get_offer($input_data['offer_id'], $branch_id);

                if (!is_object($branch_offer_data)) {
                    $this->data["success"] = "<div class='alert alert-danger'> هذا العرض غير موجود</div>";
                    return Redirect::to("branch/orders/save")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                #endregion


                #region check if offer expired
                $offer_expire_date = $branch_offer_data->expiration_date;
                if ($now >= $offer_expire_date) {
                    $this->data["success"] = "<div class='alert alert-danger'> لقد تم انتهاء صلاحية هذا العرض</div>";
                    return Redirect::to("branch/orders/save")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                #endregion


                #region check num of usage for this offer
                $num_of_usage =$get_offer->num_of_usage;
                if ($num_of_usage == 0) {
                    $this->data["success"] = "<div class='alert alert-danger'> لقد نفذ عدد المرات لاستخدام هذا العرض</div>";
                    return Redirect::to("branch/orders/save")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                #endregion


                #region check user wallet
                if(isset($request['money_used_from_wallet']) && !empty($request['money_used_from_wallet']))
                {
                    $user_wallet = $user_data->user_wallet;
                    if($request['money_used_from_wallet'] > $user_wallet)
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> محفظة هذا المستخدم لا تكفي </div>";
                        return Redirect::to("branch/orders/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }


                    if($request['money_used_from_wallet'] > $get_offer->max_offer_price)
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> لا يمكن ادخال مبلغ اكبر من سعر المنتج </div>";
                        return Redirect::to("branch/orders/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }
                }
                #endregion




                $request['user_id'] = $user_data->user_id;
                $request['branch_id'] = $branch_id;


                // update
                if ($order_id != null) {


                    $check = orders_m::find($order_id);
                    $is_updated = $check->update(clean($request->all()));

                    if ($is_updated == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/orders/save/$order_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {

                    // insert
                    $check = orders_m::create(clean($request->all()));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/orders/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $order_id = $check->order_id;

                }

                #region decrement offers count
                offer_m::where('offer_id',$request['offer_id'])->decrement('num_of_usage',1);
                #endregion


                #region decrement offers count for user
                User::where('user_id',$user_data->user_id)->decrement('offers_count',1);
                #endregion

                #region decrement user wallet
                if(isset($request['money_used_from_wallet']) && !empty($request['money_used_from_wallet']))
                {
                    User::where('user_id',$user_data->user_id)->decrement('user_wallet',$request['money_used_from_wallet']);
                }

                #endregion

                #region increment user points
                User::where('user_id',$user_data->user_id)->increment('user_points',$get_offer->num_of_points);
                #endregion

                return Redirect::to("branch/orders")->with([
                    "msg" => $this->data["success"]
                ])->send();


        }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("branch/orders")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }


        return view("branch.subviews.orders.save",$this->data);
    }


    private function getOffers($branch_id)
    {

        $cond = [];
        $cond[] = ["branches_offers.branch_id", "=", $branch_id];
        $this->data["offers"] = branches_offers_m::get_offers(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "id",
            $order_by_type          = "desc"
        );

        if(!is_array($this->data["offers"]->all()) || !count($this->data["offers"]->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد عروض حاليا أضف أولا !!</div>";
            return Redirect::to("branch/offers/save/")->with([
                "msg" => $this->data["success"]
            ])->send();
        }


    }


    private function _saving_validation($request)
    {
        $this->data["success"] = "";

        $rules_values = [];
        $rules_itself = [];
        $attrs_names  = [];


        #region rules and values

        $rules_values["serial_number"] = $request["serial_number"];
        $rules_itself["serial_number"] = "required";
        #endregion


        #region rules attributes names

        $attrs_names["serial_number.required"] = "الرقم التسلسلي للمستخدم مطلوب ادخاله";

        #endregion


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }




}