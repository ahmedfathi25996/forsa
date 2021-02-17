<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\branches\branch_m;
use App\models\branches\branches_offers_m;
use App\models\branches\offers\offer_m;
use App\models\branches\offers\offer_translate_m;
use App\models\offers_types\offers_types_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class offersController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("العروض");

            return $next($request);
        });

    }

    public function index()
    {
        $branch = branch_m::where("user_id", Auth::user()->user_id)->first();
        $branch_id = $branch->branch_id;
        $cond = [];
        $cond[] = ["branches_offers.branch_id", "=", $branch_id];
        $this->data['branch_id'] = $branch_id;

        $this->data["results"] = branches_offers_m::get_offers(
            $additional_and_wheres = $cond,
            $free_conditions = "",
            $order_by_col = "",
            $order_by_type = "asc"
        );

        return view("branch.subviews.offers.show", $this->data);
    }

    public function save(Request $request, $offer_id = null)
    {
        $this->getAllLangs();
        $this->getOffersTypes();


        $this->data["item_data"] = "";
        $this->data["item_data_translate"] = collect([]);
        $this->data["branches"] = "";
        $logo_id = 0;
        $branch = branch_m::where("user_id", Auth::user()->user_id)->first();
        $brand_id = $branch->brand_id;
        $branch_id = $branch->branch_id;

        if ($offer_id != null) {

            $offer_id = intval(clean($offer_id));
            $this->data["offer_id"] = $offer_id;

            $cond = [];
            $cond[] = ["offers.offer_id", "=", $offer_id];
            $item_data = offer_m::get_branches_offers(
                $additional_and_wheres = $cond, $free_conditions = "",
                $order_by_col = "", $order_by_type = "",
                $limit = 0, $offset = 0,
                $paginate = 0, $return_obj = "yes"
            );

            abort_if((!is_object($item_data)), 404);

            $this->data["item_data"] = $item_data;
            $this->data["item_data_translate"] = offer_translate_m::where("offer_id", $offer_id)->get();

            $logo_id = $item_data->logo_img_id;
            $item_data->logo_img_id = attachments_m::find($logo_id);

        }


            if ($request->method() == "POST") {

                $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

                if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                    $input_data = $request->all();

                    $request["brand_id"] = $brand_id;


                    #region save images

                    $request["img_id"] = $this->general_save_img(
                        $request,
                        $item_id = $offer_id,
                        $img_file_name = "logo_img_file",
                        $new_title = "",
                        $new_alt = "",
                        $upload_new_img_check = "on",
                        $upload_file_path = "/brands/branches/offers",
                        $width = 0,
                        $height = 0,
                        $photo_id_for_edit = $logo_id
                    );

                    #endregion


                    #region save slider images

                    $request["json_values_of_slidergallery_slider_file"] = json_decode($request->get("json_values_of_slidergallery_slider_file"));

                    $request["slider_ids"] = $this->general_save_slider(
                        $request,
                        $field_name = "gallery_slider_file",
                        $width = 0,
                        $height = 0,
                        $new_title_arr = "",
                        $new_alt_arr = "",
                        $json_values_of_slider = $request["json_values_of_slidergallery_slider_file"],
                        $old_title_arr = "",
                        $old_alt_arr = "",
                        $path = "/offers/gallery"
                    );

                    $request["slider_ids"] = json_encode($request["slider_ids"]);

                    #endregion



                    // update
                    if ($offer_id != null) {

                        $check = offer_m::find($offer_id);
                        $is_updated = $check->update(clean($request->all()));

                        if ($is_updated == true) {
                            $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                        } else {
                            $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                            return Redirect::to("branch/offers/save")->with([
                                "msg" => $this->data["success"]
                            ])->send();
                        }

                    } else {

                        // insert
                        $check = offer_m::create(clean($request->all()));

                        if (is_object($check)) {
                            $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";

                        } else {
                            $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                            return Redirect::to("branch/offers/save")->with([
                                "msg" => $this->data["success"]
                            ])->send();
                        }

                        $offer_id = $check->offer_id;

                    }

                    #region save translate data

                    foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                        $inputs = [];
                        $inputs["offer_id"] = $offer_id;
                        $inputs["offer_title"] = clean(array_shift($input_data["offer_title"]));
                        $inputs["offer_description"] = clean(array_shift($input_data["offer_description"]));
                        $inputs["lang_id"] = $lang_item->lang_id;

                        $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                            if ($value->lang_id == $lang_item->lang_id) {
                                return $value;
                            }

                        });

                        if (is_object($current_row->first())) {
                            // edit
                            offer_translate_m::where("id", $current_row->first()->id)->update($inputs);
                        } else {
                            // new
                            offer_translate_m::create($inputs);
                        }

                    }

                    #endregion

                    #region save branches
                    $branche_offer_id = $request['branch_offer_id'];
                    $expiration_date = $request['expiration_date'];

                    if ($branche_offer_id == 0) {
                        // add
                        $new_branch = branches_offers_m::create([
                            "branch_id" => $branch_id,
                            "offer_id" => $offer_id,
                            "expiration_date" => $expiration_date,
                            "is_active" => 0

                        ]);

                        $branche_offer_id = $new_branch->id;

                    } else {
                        // edit
                        branches_offers_m::where("id", $branche_offer_id)->update([
                            "offer_id" => $offer_id,
                            "branch_id" => $branch_id,
                            "expiration_date" => $expiration_date,
                            "is_active" => 0
                        ]);

                    }


                    #endregion


                    return Redirect::to("branch/offers")->with([
                        "msg" => $this->data["success"]
                    ])->send();

                } else {

                    if (isset($this->data["success"]) && !empty($this->data["success"])) {
                        return Redirect::to("branch/offers/save")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    } else {
                        $this->data["errors"] = $validator->messages();
                    }

                }

            }

            return view("branch.subviews.offers.save", $this->data);

    }


    private function _saving_validation($request, $translate_rows, $all_langs)
        {
            $this->data["success"] = "";

            $rules_values = [];
            $rules_itself = [];
            $attrs_names  = [];


            #region rules and values

            $rules_values["expiration_date"] = $request["expiration_date"];
            $rules_itself["expiration_date"] = "required";
            #endregion


            #region rules attributes names

            $attrs_names["expiration_date.required"] = "تاريخ انتهاء الصلاحية مطلوب ادخاله";

            #endregion

            $offer_title = $request->get("offer_title");

            foreach ($all_langs as $key => $lang_item) {

                $current_offer_name = array_shift($offer_title);
                if (in_array($current_offer_name, $offer_title) && !empty($current_offer_name)) {
                    $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار عنوان العرض</div>";
                    break;
                }


                $current_row = $translate_rows->filter(function ($value, $key) use ($lang_item) {
                    if ($value->lang_id == $lang_item->lang_id) {
                        return $value;
                    }
                });

                $translate_row_id = null;
                if (is_object($current_row->first())) {
                    $translate_row_id = $current_row->first()->id;
                }

                // rules and values
                $rules_values["offer_title_$key"] = clean($request->get("offer_title")[$key]);
                $rules_itself["offer_title_$key"] = "required";


                // rules attributes names

                $attrs_names["offer_title_$key.required"] = "الإسم في " . $lang_item->lang_text . " مطلوب إدخالة ";

            }


            $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

            return $validator;
        }


    private function getOffersTypes()
        {


            $this->data["offers_types"] = offers_types_m::get_offers_types(
                $additional_and_wheres  = [],
                $free_conditions        = "",
                $order_by_col           = "offers_type.offer_type_id",
                $order_by_type          = "desc"
            );

            if (!is_array($this->data["offers_types"]->all()) || !count($this->data["offers_types"]->all())) {
                $this->data["success"] = "<div class='alert alert-danger'> لا توجد انواع عروض أضف أولا !!</div>";
                return Redirect::to("admin/offers/types/save/")->with([
                    "msg" => $this->data["success"]
                ])->send();
            }


        }


    public function delete(Request $request)
        {

            $this->general_remove_item($request, 'App\models\branches\branches_offers_m');
        }




}