<?php

namespace App\Adapters\Implementation;

use App\Adapters\ISettingAdapter;
use App\models\attachments_m;
use App\models\banks\bank_accounts_m;
use App\models\category\category_m;
use App\models\colors_m;
use App\models\days\days_m;
use App\models\district\district_list_m;
use App\models\generate_site_content_methods_m;
use App\models\langs_m;
use App\models\pages\pages_m;
use App\models\payment_method\payment_method_m;
use App\models\plans\plan_m;
use App\models\promo_code\promo_code_m;
use App\models\promo_code\promo_code_used_m;
use App\models\setting_m;
use App\models\site_content_m;
use App\models\social_list\social_list_m;
use App\models\stores\stores_m;
use App\models\tags\tag_m;
use Carbon\Carbon;
use Config;
use DB;

class SettingAdapter implements ISettingAdapter
{
    #region social
    public function getSocial(){
        return social_list_m::get_social_pages();
    }

    #endregion


    #region pages
    public function getPage($page_slug)
    {
        $cond = [];

        $page_slug = intval($page_slug);

        if($page_slug > 0)
        {
            $cond[] = ["page_trans.page_id","=", $page_slug];
        }

        $page_result = pages_m::get_pages($cond);

        return $page_result;

    }

    public function getPages($page_type)
    {
        $page_result = pages_m::get_pages(" AND page.page_type='$page_type' AND page_trans.page_title <> '' ");
        return $page_result;

    }

    #endregion


    #region categories

    function getCategories($request)
    {

        $results = category_m::get_api_cats(
            $additional_where = "",
            $order_by = " order by cat.cat_order asc " ,
            $limit = ""
        );

        return $results;

    }
    #endregion


    #region plans
    function getPlans()
    {
        $cond = [];
        $cond[] = ["plans.is_active","=",1];
        return plan_m::get_plans($cond);
    }


    function getPlan($plan_id)
    {
        $cond = [];
        $cond = ["plans.plan_id" => $plan_id,"plans.is_active" => 1];
        return plan_m::get_plans($cond);
    }
    #endregion


    #region languages
    public function getLanguages()
    {
        return langs_m::get_langs();
    }
    #endregion

    #region cities
    public function cityDistrict(){

        return district_list_m::citiesDistricts();
    }
    #endregion



}
