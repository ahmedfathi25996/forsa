<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 23/11/17
 * Time: 10:05 م
 */

namespace App\Transformers;

use Illuminate\Support\Facades\Lang;

class BrandTransformer extends Transformer
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

    public function transformListAllBrands($brands)
    {
        $data = [];
        $allData = [];


        foreach($brands as $key => $item)
        {

            $data['id']             = isset($item->brand_id)?$item->brand_id:0;
            $data['name']           = isset($item->brand_name)?$item->brand_name:"";
            //$data['cat_id']         = isset($item->cat_id)?intval($item->cat_id):0;
            //$data['cat_name']       = isset($item->cat_name)?$item->cat_name:"";
            $data['color']          = isset($item->cat_color)?$item->cat_color:"";
            $data['image']          =url("public/images/no_image.png");
            if(!empty($item->brand_image_path) && $item->brand_image_path != "T")
            {
                $data['image'] = isset($item->brand_image_path)?url($item->brand_image_path):'';
            }

            $allData[] = $data;
            $data = [];
        }

        return array_values($allData);
    }


    public function transformSingleBrand($brand,$offers)
    {

        $data['id']     = isset($brand->brand_id)?intval($brand->brand_id):0;
        $data['name']   = isset($brand->brand_name)?$brand->brand_name:"";
        $data['cat_id']         = isset($brand->cat_id)?intval($brand->cat_id):0;
        $data['cat_name']       = isset($brand->cat_id)?$brand->cat_name:"";
        $data['branches_count'] = isset($brand->branches_count)?$brand->branches_count:0;
        $data['color']          = isset($brand->cat_color)?$brand->cat_color:"";

        $data['image'] = url("public/images/no_image.png");
        if(!empty($brand->cover_image_path) && $brand->cover_image_path != "T")
        {
            $data['image'] = isset($brand->cover_image_path)?url($brand->cover_image_path):'';
        }
        $data['offers']  =[];
        $data['offers']  = $this->brandOffers($offers);


        return $data;
    }

    public function brandOffers($offers)
    {
        $allData = [];
        foreach ($offers as $offer){
            $item = [];

            $item["id"]     = isset($offer["offer_id"])?intval($offer["offer_id"]):0;
            $item['name']  = isset($offer['offer_title'])?$offer['offer_title']:'';
            $item["offer_type"]   = isset($offer["offer_type_name"])?$offer["offer_type_name"]:'';
            $item["expiration_date"]  = isset($offer["offer_expire_date"])?$offer["offer_expire_date"]:'';
            $item['color']          = isset($offer["cat_color"])?$offer["cat_color"]:"";
            $item['image']  =url("public/images/no_image.png");
            if(!empty($offer["logo_path"]) && $offer["logo_path"] != "T")
            {
                $item['image'] = isset($offer["logo_path"])?url($offer["logo_path"]):'';
            }
            $allData[] = $item;
        }

        return array_values($allData);
    }


    public function transformHomeBrands($brands,$feature_brands)
    {
        $data['brands']  =[];
        $data['brands']  = $this->transformListAllBrands($brands);
        $data['feature_brands']  =[];
        $data['feature_brands']  = $this->transformListAllBrands($feature_brands);

        return $data;
    }


}
