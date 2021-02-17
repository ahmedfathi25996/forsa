<?php
/**
 * Created by PhpStorm.
 * User: eng.ahmedbakr
 * Date: 07/08/2018
 * Time: 04:01 م
 */

namespace App\Http\Controllers\traits;

use App\models\brands\brand_m;


trait brandTrait
{

    public function checkIfBrandExist($brand_id)
    {

        $cond       = [];
        $cond[]     = ["brands.brand_id","=",$brand_id];
        $item_data  = brand_m::get_brands(
            $additional_and_wheres  = $cond, $free_conditions   = "",
            $order_by_col           = "", $order_by_type        = "",
            $limit                  = 0 , $offset               = 0,
            $paginate               = 0 , $return_obj           = "yes"
        );
        abort_if((!is_object($item_data)),404);

        $this->data["brand_data"]   = $item_data;
        $this->data["brand_id"]     = $brand_id;

    }


}