<?php

namespace App\Adapters\Implementation;

use App\Adapters\IOfferAdapter;
use App\models\branches\branches_offers_m;
use App\models\branches\offers\offer_m;
use App\models\category\category_m;
use App\models\orders\orders_m;
use App\models\redeem_rules_m;

class OfferAdapter implements IOfferAdapter
{
    #region offers
    function getOffers($limit = 0 ,$cond = [], $free_conditions= "")
    {

        $result = offer_m::brand_offer_api(
            $additional_and_wheres  = $cond,
            $limit                  ,
            $offset                 = 0,
            $paginate               = 12,
            $free_conditions
        );

        return $result;

    }

    function getOfferObject($offer_id)
    {
        return offer_m::where('offer_id',$offer_id)->first();
    }


    function getBranches($offer_id)
    {
        $result = offer_m::get_offer_branches_api($offer_id);
        return $result;
    }

    function getOfferSlider($offer)
    {
        return offer_m::get_offer_slider($offer);

    }


    function getBranchOffer($offer_id,$branch_id)
    {
        return branches_offers_m::get_offer($offer_id,$branch_id);
    }


    function createOrder($data)
    {
        return orders_m::create($data);
    }

    function getNearByOffers($cond,$data,$limit = 0, $paginate = 0)
    {
        $lat = 0;
        $lng = 0;
        if(isset($data['lat']) && !empty($data['lat']))
        {
            $lat = $data['lat'];
        }
        if(isset($data['lng']) && !empty($data['lng']))
        {
            $lng = $data['lng'];
        }

        if($lat == 0)
        {
            return [];
        }

        return offer_m::get_nearby_offers_api($cond,$lat,$lng ,$limit,$paginate);
    }

    function getUserAllowedMoney($user_wallet)
    {
        $data = [];
        $data[] .=intval($user_wallet * .25);
        $data[] .=intval($user_wallet * .50);
        $data[] .=intval($user_wallet * .75);
        $data[] .=intval($user_wallet);
        return $data;

    }

    #endregion



}
