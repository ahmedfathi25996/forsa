<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 23/11/17
 * Time: 10:05 م
 */

namespace App\Transformers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class OfferTransformer extends Transformer
{


    /**
     * method to custom transform an item
     * @param  [mixed] $item [item to be transformed]
     * @return [mixeed]       [counts of the implementation in child class]
     */
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }

    public function transformListAllOffers($offers)
    {
        $allData = [];
        foreach ($offers as $offer){
            $item = [];

            $item["id"]     = isset($offer["offer_id"])?intval($offer["offer_id"]):0;
            $item['name']  = isset($offer['offer_title'])?$offer['offer_title']:'';
            $item["offer_type"]   = isset($offer["offer_type_name"])?$offer["offer_type_name"]:'';
            $item["expiration_date"]  = isset($offer["offer_expire_date"])?$offer["offer_expire_date"]:'';
            $item['image']  =url("public/images/no_image.png");
            $item['color']          = isset($offer["cat_color"])?$offer["cat_color"]:"";
            if(!empty($offer["logo_path"]) && $offer["logo_path"] != "T")
            {
                $item['image'] = isset($offer["logo_path"])?url($offer["logo_path"]):'';
            }
            $allData[] = $item;
        }

        return array_values($allData);
    }

    public function transformHomeOffers($offers,$hot_offers,$nearby_offers)
    {
        $data['offers']  =[];
        $data['offers']  = $this->transformListAllOffers($offers);
        $data['hot_offers']  =[];
        $data['hot_offers']  = $this->transformListAllOffers($hot_offers);
        $data['nearby_offers']  =[];
        $data['nearby_offers']  = $this->transformListAllOffers($nearby_offers);

        return $data;
    }

    public function transformSingleOffer($offer,$branches,$offer_slider,$user_allowed_money)
    {
        $user = Auth::user();
        $data = [];


        $data['offer_id']     = isset($offer["offer_id"])?intval($offer["offer_id"]):0;
        $data['brand_name']   = isset($offer["brand_name"])?$offer["brand_name"]:"";
        $data['brand_image']  =url("public/images/no_image.png");
        if(!empty($offer['brand_cover_path']) && $offer['brand_cover_path'] != "T")
        {
            $data['brand_image'] = isset($offer['brand_cover_path'])?url($offer['brand_cover_path']):'';
        }
        $data['offer_title']   = isset($offer["offer_title"])?$offer["offer_title"]:"";
        $data['offer_description']   = isset($offer["offer_description"])?$offer["offer_description"]:"";
        $data['offer_type']         = isset($offer["offer_type_name"])?$offer["offer_type_name"]:"";
        $data['cat_name']       = isset($offer["cat_name"])?$offer["cat_name"]:"";
        $data["expiration_date"]  = isset($offer["offer_expire_date"])?$offer["offer_expire_date"]:'';
        $data['color']          = isset($offer["cat_color"])?$offer["cat_color"]:"";
        $data['offer_image']  =url("public/images/no_image.png");
        if(!empty($offer['logo_path']) && $offer['logo_path'] != "T")
        {
            $data['offer_image'] = isset($offer['logo_path'])?url($offer['logo_path']):'';
        }
        $data['offer_slider'] = [];
        if(isset($offer["slider_ids"]) && is_array($offer["slider_ids"]) && count($offer["slider_ids"]))
        {

            $offer_slider = [];
            foreach($offer["slider_ids"] as $key => $img)
            {

                if(!empty($img->path) && $img->path != "T")
                {
                    $offer_slider[] = url($img->path);
                }

            }

            $data['offer_slider'] = $offer_slider;

        }

        $data['branches']  =[];
        $data['branches']  = $this->offerBranches($branches);

        $data['use_from_wallet'] = [];
        if(is_array($user_allowed_money) && count($user_allowed_money))
        {
            $data['use_from_wallet'] =$user_allowed_money;

        }


        return $data;
    }

    public function offerBranches($branches)
    {
        $allData = [];
        foreach ($branches as $branch){
            $item = [];

            $item["branch_id"]     = isset($branch["branch_id"])?intval($branch["branch_id"]):0;
            $item['branch_name']  = isset($branch['branch_name'])?$branch['branch_name']:'';
            $item["branch_description"]   = isset($branch["branch_description"])?$branch["branch_description"]:'';
            $item["phone_number"]  = isset($branch["phone_number"])?$branch["phone_number"]:'';
            $item['map_lat']       = isset($branch["map_lat"])?$branch["map_lat"]:"";
            $item['map_lng']       = isset($branch["map_lng"])?$branch["map_lng"]:"";
            $item["address"]       = (isset($branch["district_name"])?$branch["district_name"]:"")." - ". (isset($branch["city_name"])?$branch["city_name"]:"");

            $allData[] = $item;
        }

        return array_values($allData);
    }




}
