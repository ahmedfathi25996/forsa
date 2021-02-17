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

class HomeTransformer extends Transformer
{

    public function transform($homeContent)
    {
        $data  = [];

        foreach($homeContent as $key => $item)
        {

            $methodName = "transformHome".$key;

            if(method_exists($item,"all"))
            {
                $item = $item->all();
            }

            if(method_exists($this, $methodName) && (is_array($item) && count($item) > 0))
            {
                $data[] = $this->{$methodName}($item);
            }

        }

        return $data;
    }


    #region Offers

    public function transformHomeHotOffers($offers)
    {

        $allData = [
            "header"        => Lang::get("general.hot_offers"),
            "itemsType"     => "offer",
            "cardType"      => "wide_card",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "hotOffers",
            "sort"          => 1,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleOffer($offers);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeOffers($offers)
    {

        $allData = [
            "header"        => Lang::get("general.offers"),
            "itemsType"     => "offer",
            "cardType"      => "wide_card",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "offers",
            "sort"          => 4,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleOffer($offers);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeNearbyOffers($offers)
    {

        $allData = [
            "header"        => Lang::get("general.nearby_offers"),
            "itemsType"     => "offer",
            "cardType"      => "small_card",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "nearByOffers",
            "sort"          => 5,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleOffer($offers);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeSingleOffer($offers)
    {

        $allData = [];
        foreach ($offers as $key => $offer){
            $item = [];

            $item["id"]     = isset($offer->offer_id)?intval($offer->offer_id):0;
            $item['name']   = isset($offer->offer_title)?$offer->offer_title:"";
            $item['image']  = url("public/images/no_image.png");
            if(!empty($offer->logo_path) && $offer->logo_path != "T")
            {
                $item['image'] = isset($offer->logo_path)?url($offer->logo_path):"";
            }

            $item["color"]              = isset($offer->cat_color)?$offer->cat_color:"";
            $item["offer_type"]         = isset($offer->offer_type_name)?$offer->offer_type_name:"";
            $item["expiration_date"]    = isset($offer->offer_expire_date)?$offer->offer_expire_date:"";

            $allData[] = $item;
        }

        return array_values($allData);
    }


    #endregion


    #region Brands

    public function transformHomeFeaturedBrands($brands)
    {

        $allData = [
            "header"        => Lang::get("general.featured_brands"),
            "itemsType"     => "brand",
            "cardType"      => "small_card",
            "AllowSeeAll"   => 0,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "",
            "sort"          => 2,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleBrand($brands);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeBrands($brands)
    {

        $allData = [
            "header"        => Lang::get("general.brands"),
            "itemsType"     => "brand",
            "cardType"      => "block",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "brands",
            "sort"          => 3,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleBrand($brands);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    // TODO remove the following
    public function transformHomeTempBrands($brands)
    {

        $allData = [
            "header"        => Lang::get("general.brands"),
            "itemsType"     => "brand",
            "cardType"      => "small_card",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "brands",
            "sort"          => 3,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleBrand($brands);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeSingleBrand($brands)
    {
        $allData = [];
        foreach ($brands as $key => $brand){

            $item = [];

            $item['id']    = isset($brand->brand_id)?$brand->brand_id:0;
            $item['name']  = isset($brand->brand_name)?$brand->brand_name:"";
            $item['image'] = url("public/images/no_image.png");
            if(!empty($brand->brand_image_path) && $brand->brand_image_path != "T")
            {
                $item['image'] = isset($brand->brand_image_path)?url($brand->brand_image_path):'';
            }

            $item["color"]              = isset($brand->cat_color)?$brand->cat_color:"";

            $allData[] = $item;
        }

        return array_values($allData);
    }

    #endregion


    #region Categories

    public function transformHomeCategories($categories)
    {

        $allData = [
            "header"        => Lang::get("general.categories"),
            "itemsType"     => "category",
            "cardType"      => "circle",
            "AllowSeeAll"   => 1,
            "seeAllKeyword" => Lang::get("general.see_all"),
            "seeAllAction"  => "categories",
            "sort"          => 6,
            "data"          => []
        ];

        $getOffer           = $this->transformHomeSingleCategory($categories);
        $allData["data"]    = $getOffer;

        return ($allData);
    }

    public function transformHomeSingleCategory($categories)
    {
        $allData = [];
        foreach ($categories as $key => $category){

            $item = [];

            $item['id']    = isset($category->cat_id)?$category->cat_id:0;
            $item['name']  = isset($category->cat_name)?$category->cat_name:"";
            $item['image'] = url("public/images/no_image.png");
            if(!empty($category->cat_img) && $category->cat_img != "T")
            {
                $item['image'] = isset($category->cat_img)?url($category->cat_img):"";
            }

            $item["color"]              = isset($category->color)?$category->color:"";

            $allData[] = $item;
        }

        return array_values($allData);
    }

    #endregion

}
