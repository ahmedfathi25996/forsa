<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\branches\branch_m;
use App\models\branches\working_days\branch_working_days_m;
use App\models\days\days_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class branchesWorkingDaysController extends adminBaseController
{


    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("أيام العمل");

            return $next($request);
        });

    }

    public function index()
    {

        $branch = branch_m::where("user_id",Auth::user()->user_id)->first();
        $cond       = [];
        $cond[]     = ["branch_working_days.branch_id","=",$branch->branch_id];
        $this->data["results"] = branch_working_days_m::get_working_days(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "days.day_order",
            $order_by_type          = "asc"
        );

        return view("branch.subviews.working_days.show", $this->data);
    }

    public function save(Request $request, $id = null)
    {

        $this->data["item_data"]                = "";
        $branch = branch_m::where("user_id",Auth::user()->user_id)->first();
        $branch_id = $branch->branch_id;



        #region get days

        $this->data["days"] = days_m::get_days(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "days.day_order",
            $order_by_type          = "asc"
        );

        #endregion


        if ($id != null)
        {

            $id     = intval(clean($id));

            $cond       = [];
            $cond[]     = ["branch_working_days.id","=",$id];
            $item_data  = branch_working_days_m::get_working_days(
                $additional_and_wheres  = $cond, $free_conditions   = "",
                $order_by_col           = "", $order_by_type        = "",
                $limit                  = 0 , $offset               = 0,
                $paginate               = 0 , $return_obj           = "yes"
            );
            abort_if((!is_object($item_data)),404);

            $this->data["item_data"]                = $item_data;

        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request);

            if(count($validator->messages()) == 0 && empty($this->data["success"]))
            {

                $request = clean($request->all());

                $day_id                     = intval($request["day_id"]);
                $request["branch_id"]        = $branch_id;
                $request["time_from"]       = date("H:i:s", strtotime($request["time_from"]));
                $request["time_to"]         = date("H:i:s", strtotime($request["time_to"]));



                // update
                if ($id != null)
                {

                    #region check custom rule

                    $check_exist = branch_working_days_m::where([
                        "branch_id"  => $branch_id,
                        "day_id"    => $day_id,
                    ])->where("id","<>",$id)->first();

                    if(is_object($check_exist))
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> هذا اليوم مسجل مسبقا</div>";
                        return Redirect::to("branch/working_days/save/$id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    #endregion


                    $check = branch_working_days_m::find($id)->update($request);

                    if ($check == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/working_days/save/$id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }
                else{

                    #region check custom rule

                    $check_exist = branch_working_days_m::where([
                        "branch_id"  => $branch_id,
                        "day_id"    => $day_id,
                    ])->first();

                    if(is_object($check_exist))
                    {
                        $this->data["success"] = "<div class='alert alert-danger'> هذا اليوم مسجل مسبقا</div>";
                        return Redirect::to("branch/working_days/save/$id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    #endregion

                    // insert
                    $check = branch_working_days_m::create($request);

                    if (is_object($check))
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/working_days/save/")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $id = $check->id;

                }

                return Redirect::to("branch/working_days/save/$id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("branch/working_days/save/$id")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }

        return view("branch.subviews.working_days.save",$this->data);
    }


    private function _saving_validation($request)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        #region rules and values

        $rules_values["day_id"]                 = clean($request->get("day_id"));
        $rules_itself["day_id"]                 = "required";

        $rules_values["time_from"]              = date("H:i:s", strtotime(clean($request->get("time_from"))));
        $rules_itself["time_from"]              = "required|date_format:H:i:s";

        $rules_values["time_to"]                = date("H:i:s", strtotime(clean($request->get("time_to"))));
        $rules_itself["time_to"]                = "required|date_format:H:i:s|after:time_from";

        #endregion

        #region rules attributes names

        $attrs_names["day_id.required"]             = "اليوم مطلوب إدخالة";
        $attrs_names["time_from.required"]          = "الوقت من مطلوب إدخالة";
        $attrs_names["time_from.date_format"]       = "الوقت من يجب ان يكون وقت صحيح";
        $attrs_names["time_to.required"]            = "الوقت الي مطلوب إدخالة";
        $attrs_names["time_to.date_format"]         = "الوقت الي يجب ان يكون وقت صحيح";
        $attrs_names["time_to.after"]               = "الوقت الي يجب ان يتجاوز الوقت من";

        #endregion

        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


    public function delete(Request $request){

        $this->general_remove_item($request,'App\models\branches\working_days\branch_working_days_m');
    }


}
