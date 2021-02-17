<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\adminBaseController;
use App\models\attachments_m;
use App\models\branches\branch_m;
use App\models\branches\branch_translate_m;
use App\models\brands\brand_m;
use App\models\city\city_list_m;
use App\models\district\district_list_m;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BranchesController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("بيانات الفرع");

            return $next($request);
        });

    }

    public function index()
    {
        $cond       = [];
        $cond[]     = ["branches.user_id","=",Auth::user()->user_id];

        $this->data["results"] = branch_m::get_branches(
            $additional_and_wheres  = $cond,
            $free_conditions        = "",
            $order_by_col           = "branches.branch_id",
            $order_by_type          = "asc"
        );

        return view("branch.subviews.branches.show", $this->data);
    }

    public function save(Request $request, $branch_id = null)
    {

        $this->getAllLangs();

        $this->getCitiesAndDistricts();

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);
        $logo_id                                = 0;
        $cover_id                               = 0;


        if ($branch_id != null)
        {

            $branch_id                   = intval(clean($branch_id));
            $this->data["branch_id"]     = $branch_id;

            $cond       = [];
            $cond[]     = ["branches.branch_id","=",$branch_id];
            $item_data  = branch_m::get_branches(
                $additional_and_wheres  = $cond, $free_conditions   = "",
                $order_by_col           = "", $order_by_type        = "",
                $limit                  = 0 , $offset               = 0,
                $paginate               = 0 , $return_obj           = "yes"
            );

            abort_if((!is_object($item_data)),404);


            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = branch_translate_m::where("branch_id",$branch_id)->get();

            $logo_id                                = $item_data->logo_id;
            $item_data->logo_img                    = attachments_m::find($logo_id);

            $cover_id                               = $item_data->cover_id;
            $item_data->cover_img                   = attachments_m::find($cover_id);


        }

        if ($request->method() == "POST")
        {

            $validator = $this->_saving_validation($request, $this->data["item_data_translate"], $this->data["all_langs"]);

            if(count($validator->messages()) == 0 && empty($this->data["success"]))
            {

                $input_data = $request->all();


                #region save images

                $request["logo_id"]     = $this->general_save_img(
                    $request ,
                    $item_id                = $branch_id,
                    $img_file_name          = "logo_img_file",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/brands/branches/logo",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $logo_id
                );

                $request["cover_id"]    = $this->general_save_img(
                    $request ,
                    $item_id                = $branch_id,
                    $img_file_name          = "cover_img_file",
                    $new_title              = "",
                    $new_alt                = "",
                    $upload_new_img_check   = "on",
                    $upload_file_path       = "/brands/branches/covers",
                    $width                  = 0,
                    $height                 = 0,
                    $photo_id_for_edit      = $cover_id
                );

                #endregion

                $user_data              = [];

                $user_data["full_name"] = clean($request["full_name"]);
                $user_data["email"]     = clean($request["email"]);
                $user_data["user_type"] = "branch";
                $user_data["is_active"] = 1;



                // update
                if ($branch_id != null)
                {
                    $check      = branch_m::find($branch_id);
                    $is_updated = $check->update(clean($request->all()));

                    if ($is_updated == true)
                    {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                    }
                    else{
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("branch/branches/save/$branch_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                }

                #region save translate data

                foreach($this->data["all_langs"] as $lang_key => $lang_item)
                {
                    $inputs                                 = [];
                    $inputs["branch_id"]                    = $branch_id;
                    $inputs["branch_name"]                  = clean(array_shift($input_data["branch_name"]));
                    $inputs["branch_description"]           = clean(array_shift($input_data["branch_description"]));
                    $inputs["lang_id"]                      = $lang_item->lang_id;

                    $current_row = $this->data["item_data_translate"]->filter(function ($value, $key) use($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id)
                        {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first()))
                    {
                        // edit
                        branch_translate_m::where("id",$current_row->first()->id)->update($inputs);
                    }
                    else{
                        // new
                        branch_translate_m::create($inputs);
                    }

                }

                #endregion


                return Redirect::to("branch/branches/save/$branch_id")->with([
                    "msg" => $this->data["success"]
                ])->send();

            }
            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("branch/branches/save/$branch_id")->with([
                        "msg" => $this->data["success"]
                    ])->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }

        return view("branch.subviews.branches.save",$this->data);
    }


    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];


        #region rules and values

        $rules_values["city_id"]                       = clean($request->get("city_id"));
        $rules_itself["city_id"]                       = "required";

        $rules_values["district_id"]                   = clean($request->get("district_id"));
        $rules_itself["district_id"]                   = "required";

        $rules_values["map_lat"]                       = clean($request->get("map_lat"));
        $rules_itself["map_lat"]                       = "required";

        $rules_values["map_lng"]                       = clean($request->get("map_lng"));
        $rules_itself["map_lng"]                       = "required";

        $rules_values["logo_img_file"]                 = $request["logo_img_file"];
        $rules_itself["logo_img_file"]                 = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";

        $rules_values["cover_img_file"]                = $request["cover_img_file"];
        $rules_itself["cover_img_file"]                = "nullable|image|mimes:jpg,jpeg,bmp,png,gif";

        #endregion


        #region rules attributes names

        $attrs_names["city_id.required"]               = "المدينة مطلوب إدخالها ";

        $attrs_names["district_id.required"]           = "الحي مطلوب إدخاله ";

        $attrs_names["map_lat.required"]               = "إحداثي خط العرض مطلوب إدخالة";
        $attrs_names["map_lng.required"]               = "إحداثي خط الطول مطلوب إدخالة";

        $attrs_names["logo_img_file.image"]            = "الصورة الأساسية غير صالحة";
        $attrs_names["logo_img_file.mimes"]            = "الصورة الأساسية غير صالحة";

        $attrs_names["cover_img_file.image"]           = "الصورة الخلفية غير صالحة";
        $attrs_names["cover_img_file.mimes"]           = "الصورة الخلفية غير صالحة";

        #endregion


        $branch_name           = $request->get("branch_name");

        foreach($all_langs as $key => $lang_item)
        {

            $current_branch_name = array_shift($branch_name);
            if (in_array($current_branch_name, $branch_name) && !empty($current_branch_name))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم الفرع</div>";
                break;
            }

            $current_row = $translate_rows->filter(function ($value, $key) use($lang_item) {
                if ($value->lang_id == $lang_item->lang_id)
                {
                    return $value;
                }
            });

            $translate_row_id       = null;
            if(is_object($current_row->first())){
                $translate_row_id   = $current_row->first()->id;
            }

            // rules and values
            $rules_values["branch_name_$key"]                    = clean($request->get("branch_name")[$key]);
            $rules_itself["branch_name_$key"]                    = "required|unique:branches_translate,branch_name,".$translate_row_id.",id,deleted_at,NULL";


            // rules attributes names

            $attrs_names["branch_name_$key.required"]            = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["branch_name_$key.unique"]              = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }

    private function getCitiesAndDistricts()
    {


        $this->data["cities"] = city_list_m::get_cities(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "city_list.city_id",
            $order_by_type          = "desc"
        );

        if(!is_array($this->data["cities"]->all()) || !count($this->data["cities"]->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد مدن حاليا أضف أولا !!</div>";
            return Redirect::to("admin/cityList/save/")->with([
                "msg" => $this->data["success"]
            ])->send();
        }

        $this->data["districts"] = district_list_m::get_districts(
            $additional_and_wheres  = [],
            $free_conditions        = "",
            $order_by_col           = "district_list.district_id",
            $order_by_type          = "desc"
        );

        if(!is_array($this->data["districts"]->all()) || !count($this->data["districts"]->all()))
        {
            $this->data["success"] = "<div class='alert alert-danger'> لا توجد احياء حاليا أضف أولا !!</div>";
            return Redirect::to("admin/districtList/save/")->with([
                "msg" => $this->data["success"]
            ])->send();
        }

    }



    public function delete(Request $request,$brand_id){

        $item_id        = intval(clean($request->get("item_id",0)));

        #region remove translation
        branch_translate_m::where('branch_id',$item_id)->delete();
        #endregion

        #region decrement branches count
        brand_m::where('brand_id',$brand_id)->decrement('branches_count',1);
        #endregion

        $this->general_remove_item($request,'App\models\branches\branch_m');
    }


}
