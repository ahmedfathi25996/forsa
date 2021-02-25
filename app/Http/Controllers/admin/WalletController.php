<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\doctors\doctors_m;
use App\models\social_list\social_list_m;
use App\models\social_list\social_list_translate_m;
use App\models\wallet_history_m;
use App\models\wallet_transactions_m;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class WalletController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("المحفظة");

            return $next($request);
        });

    }

    public function index($doctor_id)
    {
        $cond = [];
        $cond[] = ["wallet_history.doctor_id","=",$doctor_id];
        $this->data["results"] = wallet_history_m::get_wallet_history(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "wallet_history.wallet_id",
            $order_by_type          = "desc"
        );

        $this->data['doctor_id'] = $doctor_id;


        return view("admin.subviews.wallet.show", $this->data);
    }

    public function save(Request $request,$doctor_id, $wallet_trans_id = null)
    {
        $this->getAllLangs();
        $img_id = 0;

        $doctor_id = intval($doctor_id);
        $this->data["item_data"] = "";
        $this->data['doctor_id'] = $doctor_id;

        if ($wallet_trans_id != null) {

            $wallet_trans_id = intval($wallet_trans_id);

            $cond = [];
            $cond[] = ["wallet_transactions.doctor_id", "=", $doctor_id];
            $item_data = wallet_transactions_m::get_wallet_transactions(
                $additional_and_wheres = $cond
            )->all();
            abort_if((!count($item_data)), 404);

            $item_data = $item_data[0];
            $this->data["item_data"] = $item_data;
            $img_id = $item_data->wallet_img_id;
            $item_data->wallet_img_id = attachments_m::find($item_data->wallet_img_id);

        }


        if ($request->method() == "POST") {

            $validator = $this->_saving_validation($request);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {
                $request["img_id"] = $this->general_save_img(
                    $request,
                    $item_id = $wallet_trans_id,
                    $img_file_name = "wallet_img_file",
                    $new_title = "",
                    $new_alt = "",
                    $upload_new_img_check = "on",
                    $upload_file_path = "/wallet",
                    $width = 0,
                    $height = 0,
                    $photo_id_for_edit = $img_id
                );


                // update
                if ($wallet_trans_id != null) {

                    $check = wallet_transactions_m::find($wallet_trans_id)->update($request->all());

                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/wallet_transaction/doctors/$doctor_id/save/$wallet_trans_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                } else {
                    $start_date = wallet_history_m::where('doctor_id', $doctor_id)->where('is_done', 0)->whereNull("deleted_at")->
                    min("created_at");

                    $end_date = wallet_history_m::where('doctor_id', $doctor_id)->where('is_done', 0)->whereNull("deleted_at")->
                    max("created_at");
                    $get_doctor = doctors_m::where('doctor_id', $doctor_id)->first();
                    $get_user = User::where("user_id", $get_doctor->user_id)->first();

                    // insert
                    $request["doctor_id"] = $doctor_id;
                    $request['from_date'] = $start_date;
                    $request['to_date'] = $end_date;
                    $request['value'] = $get_user->user_wallet;


                    $check = wallet_transactions_m::create($request->all());
                     wallet_history_m::where("doctor_id",$doctor_id)->update([
                        "is_done" => 1
                    ]);
                    $get_user->update([
                        "user_wallet" => 0
                    ]);

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/wallet_transaction/doctors/$doctor_id/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $wallet_trans_id = $check->wallet_trans_id;

                }


                return Redirect::to("admin/wallet_transaction/doctors/$doctor_id")->with([
                    "msg" => $this->data["success"]
                ])->send();


            } else {

                if (isset($this->data["success"]) && !empty($this->data["success"])) {
                    return Redirect::to("admin/wallet_transaction/doctors/$doctor_id/save")->with(
                        [
                            "msg" => $this->data["success"]
                        ]
                    )->send();
                } else {
                    $this->data["errors"] = $validator->messages();
                }

            }

        }
        return view("admin.subviews.wallet_transactions.save", $this->data);

    }



    private function _saving_validation($request)
    {
        $this->data["success"]                   = "";

        $rules_values                            = [];
        $rules_itself                            = [];
        $attrs_names                             = [];

        $img_id                                  = $request['wallet_img_file'];


        $rules_values["wallet_img_file"]                  = $request['social_img_file'];
        $rules_itself["wallet_img_file"]                  = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";
        $attrs_names["wallet_img_file.image"]             = "صورة الصفحة غير صالحة";
        $attrs_names["wallet_img_file.mimes"]             = "صورة الصفحة غير صالحة";




        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    public function get_wallet_transactions($doctor_id)
    {
        $cond = [];
        $cond[] = ["wallet_transactions.doctor_id","=",$doctor_id];
        $this->data["results"] = wallet_transactions_m::get_wallet_transactions(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "wallet_transactions.wallet_trans_id",
            $order_by_type          = "desc"
        );

        $this->data['doctor_id'] = $doctor_id;


        return view("admin.subviews.wallet_transactions.show", $this->data);
    }


}
