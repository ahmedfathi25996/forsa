<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\adminBaseController;
use App\models\category\category_m;
use App\models\category\category_translate_m;
use App\models\langs_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\models\attachments_m;

class CategoryController extends adminBaseController
{

    public function __construct()
    {

        parent::__construct();

        $this->middleware(function ($request, $next) {

            $this->setMetaTitle("الاقسام");

            return $next($request);
        });

    }

    public $allowed_cat_types=["default"];
    public $two_level_cats=["article","stock","broadcast"];


    public function index($cat_type="default",$parent_id = 0)
    {

        $this->data["parent_id"] = $parent_id;
        $this->data["cat_type"] = $cat_type;

        $cond_arr=[];
        $cond_arr[]=" AND (cat.cat_type='$cat_type') ";
        $cond_arr[]=" AND cat.parent_id=$parent_id ";


        $this->data["results"] = category_m::get_all_cats(implode(" ",$cond_arr) , " order by cat.cat_order ");


        return view("admin.subviews.categories.show")->with($this->data);
    }


    public function save_cat(Request $request , $cat_type = "default" ,$cat_id = null)
    {

        $this->getAllLangs();
        $small_img_id                           = 0;
        $this->data["cat_type"]                 = $cat_type;

        $this->data["item_data"]                = "";
        $this->data["item_data_translate"]      = collect([]);

        $parent_id                              = $request->get('parent_id',0);
        $this->data["buffet_parent_id"]         = $parent_id;


        if ($cat_id != null)
        {

            $cat_id    = intval(clean($cat_id));

            $parent_id = $request->get('parent_id',0);
            $this->data["buffet_parent_id"] = $parent_id;
            $this->data["selected_cat_type"] = $cat_type;
            $item_data= category_m::get_all_cats(" AND cat.cat_id=$cat_id");
            abort_if((!count($item_data)),404);

            $item_data                              = $item_data[0];
            $this->data["item_data"]                = $item_data;
            $this->data["item_data_translate"]      = category_translate_m::where("cat_id",$cat_id)->get();
            $small_img_id                           = $item_data->cat_img_id;
            $item_data->cat_img_id               = attachments_m::find($item_data->cat_img_id);

        }


        if ($request->method() == "POST")
        {
            $validator = $this->_saving_validation($request,$this->data["item_data_translate"],$this->data['all_langs']);

            if (count($validator->messages()) == 0 && empty($this->data["success"])) {

                $request["small_img_id"]        = $this->general_save_img(
                    $request,
                    $item_id              = $cat_id,
                    $img_file_name        = "cat_img_file",
                    $new_title            = "",
                    $new_alt              = "",
                    $upload_new_img_check = "on",
                    $upload_file_path     = "/categories",
                    $width                = 0,
                    $height               = 0,
                    $photo_id_for_edit    = $small_img_id
                );

                $input_data               = $request->all();
                $input_data["cat_type"]   = $cat_type;

                if($parent_id > 0)
                {
                    $input_data["parent_id"] = $parent_id;
                }
/*
                $get_max_order = category_m::where("cat_type",$cat_type)->where("parent_id",$input_data["parent_id"])->max('cat_order');
                $inputs["cat_order"] = ($get_max_order + 1);

*/
                $return_id=0;

                // update
                if ($cat_id != null) {

                    $check = category_m::find($cat_id)->update(clean($input_data));


                    if ($check == true) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                        $return_id=$cat_id;
                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/category/save_cat/$cat_type/$cat_id")->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }


                } else {

                    // insert
                    $check = category_m::create(clean($input_data));

                    if (is_object($check)) {
                        $this->data["success"] = "<div class='alert alert-success'> تم الحفظ بنجاح </div>";
                        $return_id=$check->cat_id;

                    } else {
                        $this->data["success"] = "<div class='alert alert-danger'> حدث خطأ لم يتم الحفظ</div>";
                        return Redirect::to("admin/category/save_cat/$cat_type" )->with([
                            "msg" => $this->data["success"]
                        ])->send();
                    }

                    $cat_id = $check->cat_id;

                }

                #region save translate data


                foreach ($this->data["all_langs"] as $lang_key => $lang_item) {
                    $inputs = [];
                    $inputs["cat_id"]            = $return_id;
                    $inputs["cat_name"]          = clean(array_shift($input_data["cat_name"]));
                    $inputs["cat_short_desc"]    = clean(array_shift($input_data["cat_short_desc"]));



                    $inputs["lang_id"]       = $lang_item->lang_id;

                    $current_row             = $this->data["item_data_translate"]->filter(function ($value, $key) use ($lang_item) {
                        if ($value->lang_id == $lang_item->lang_id) {
                            return $value;
                        }

                    });

                    if (is_object($current_row->first())) {
                        // edit
                        category_translate_m::where("id", $current_row->first()->id)->update($inputs);
                    } else {
                        // new
                        category_translate_m::create($inputs);
                    }


                }
                return Redirect::to("admin/category/save_cat/$cat_type/$cat_id")->with(["msg"=>"<div class='alert alert-success'> تم الحفظ بنجاح </div>"])->send();

            }
            #endregion


            else{

                if(isset($this->data["success"]) && !empty($this->data["success"]))
                {
                    return Redirect::to("admin/category/save_cat/$cat_type/$cat_id")->with(
                        [
                            "msg"=> $this->data["success"]
                        ]
                    )->send();
                }
                else{
                    $this->data["errors"] = $validator->messages();
                }

            }

        }


        return view("admin.subviews.categories.save",$this->data);
    }



    private function _saving_validation($request, $translate_rows, $all_langs)
    {
        $this->data["success"]  = "";

        $rules_values           = [];
        $rules_itself           = [];
        $attrs_names            = [];

        $cat_name    = clean($request["cat_name"]);


        foreach($all_langs as $key => $lang_item)
        {

            $current_name = clean(array_shift($cat_name));
            if (in_array($current_name, $cat_name) && !empty($current_name))
            {
                $this->data["success"] = "<div class = 'alert alert-danger'>لا يمكن تكرار اسم القسم</div>";
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

            $rules_values["cat_name$key"]              = clean($request->get("cat_name")[$key]);
            $rules_itself["cat_name$key"]              = "required|unique:category_translate,cat_name,".$translate_row_id.",id,deleted_at,NULL";
            $attrs_names["cat_name$key.required"]      = "الإسم في ".$lang_item->lang_text." مطلوب إدخالة ";
            $attrs_names["cat_name$key.unique"]        = "الإسم في ".$lang_item->lang_text." مسجل مسبقا ";

        }


        $validator = Validator::make($rules_values, $rules_itself, $attrs_names);

        return $validator;
    }


    public function delete_cat(Request $request){
        $item_id        = intval(clean($request->get("item_id",0)));


        #region remove translation
        category_translate_m::where('cat_id',$item_id)->delete();
        #endregion
        $this->general_remove_item($request,'App\models\category\category_m');
    }


}
