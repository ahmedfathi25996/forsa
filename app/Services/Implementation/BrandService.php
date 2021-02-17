<?php

namespace App\Services\Implementation;

use App\Adapters\IBrandAdapter;
use App\Helpers\MessageHandleHelper;
use App\Services\IBrandService;
use App\Transformers\BrandTransformer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;


class BrandService implements IBrandService {

    use DispatchesJobs;

    protected $adapter;
    protected $transform;
    protected $messageHandle;

    public function __construct(IBrandAdapter $adapter, MessageHandleHelper $messageHandle, BrandTransformer $transform) {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;
        $this->transform= $transform;

    }

    public function listAllBrands($request)
    {
        $data = $this->adapter->getBrands(0);
        $result = $this->transform->transformListAllBrands($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getFeatureBrands($request)
    {
        $cond       = [];
        $cond[]     = ["brands.is_feature","=",1];
        $data = $this->adapter->getBrands(0,$cond);
        $result = $this->transform->transformListAllBrands($data->all());
        return $this->messageHandler->getJsonSuccessResponse("", $result);

    }

    public function getBrand($request,$brand_id)
    {
        $user = Auth::user();
        $brand = $this->adapter->getBrandObject($brand_id);

        if(!is_object($brand))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.brand_not_exist"));
        }
        $cond       = [];
        $cond     = array_merge($cond,[
            "brands.brand_id" => $brand_id,
        ]);

        $data = $this->adapter->getBrands(0,$cond,'yes');
        $offers    = $this->adapter->getBrandOffers($request,$brand_id,$user);
        $result = $this->transform->transformSingleBrand($data,$offers);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getBrands()
    {
        $cond       = [];
        $cond[]     = ["brands.is_feature","=",1];
        $brands = $this->adapter->getBrands(4);
        $feature_brands = $this->adapter->getBrands(4,$cond);
        $result = $this->transform->transformHomeBrands($brands->all(),$feature_brands->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }



    public function getCategoryBrands($request,$cat_id)
    {
        $category = $this->adapter->getCategoryObject($cat_id);

        if(!is_object($category))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse("هذا القسم غير موجود");
        }
        $cond       = [];
        $cond     = ["category.cat_id" => $cat_id];
        $brands = $this->adapter->getBrands(0,$cond);
        $result = $this->transform->transformListAllBrands($brands->all());
        return $this->messageHandler->getJsonSuccessResponse("", $result);

    }



}
