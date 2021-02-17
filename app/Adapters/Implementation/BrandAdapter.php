<?php

namespace App\Adapters\Implementation;

use App\Adapters\IBrandAdapter;
use App\models\branches\offers\offer_m;
use App\models\brands\brand_m;
use App\models\category\category_m;
use Carbon\Carbon;

class BrandAdapter implements IBrandAdapter
{

    function getBrands($limit = 0 ,$cond = [], $object = 'no')
    {

        $result = brand_m::get_brands(
            $additional_and_wheres  = $cond, $free_conditions      = "",
            $order_by_col           = "brands.brand_id", $order_by_type        = "desc",
            $limit                  = $limit , $offset           = 0,
            $paginate               = 12 , $return_obj       = $object,
            $dashboard              = "false"
        );

        return $result;
    }

    function getBrandObject($brand_id)
    {
        return brand_m::where('brand_id',$brand_id)->first();
    }

    function getBrandOffers($request,$brand_id,$user)
    {
        $cond       = [];
        $cond = array_merge($cond,[
            "brands.brand_id" => $brand_id,
            "branches_offers.is_active" => 1
        ]);

        if(!is_object($user) || (is_object($user) && $user->plan_id == 1))
        {
            $cond  = array_merge($cond, [
                "offers.offer_allowed_to"   => "all" ,
            ]);
        }

        if(isset($request['lat']) && !empty($request['lat']) && isset($request['lng']) && !empty($request['lng']))
        {

            $lat = 0;
            $lng = 0;
            if(isset($request['lat']) && !empty($request['lat']))
            {
                $lat = $request['lat'];
            }
            if(isset($request['lng']) && !empty($request['lng']))
            {
                $lng = $request['lng'];
            }

            if($lat == 0)
            {
                return [];
            }

            $result =  offer_m::get_nearby_offers_api($cond,$lat,$lng ,0,10);

        }else{

            if(isset($request['city_id']) && !empty($request['city_id']))
            {
                $cond = array_merge($cond,[
                    "branches.city_id" => $request['city_id']
                ]);
            }
            if(isset($request['district_id']) && !empty($request['district_id']))
            {
                $cond = array_merge($cond,[
                    "branches.district_id" => $request['district_id']
                ]);
            }

            $result = offer_m::brand_offer_api($cond,0,0,10);
        }

        return $result;
    }


    #region categories
    function getCategoryObject($cat_id)
    {
        return category_m::where("cat_id",$cat_id)->first();
    }
    #endregion

}
