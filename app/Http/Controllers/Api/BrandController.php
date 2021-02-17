<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Services\IAuthService;
use App\Services\IBrandService;
use Illuminate\Http\Request;


class BrandController extends api_controller
{
    /**
     * @var IAuthService
     */
    protected $service;
    protected $validator;

    /**
     * AuthController constructor.
     * @param IAuthService $service
     * @param ValidationHelper $validator
     */
    public function __construct(IBrandService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }

    public function listAllBrands(Request $request)
    {
        $request = $request->all();
        return $this->service->listAllBrands($request);
    }

    public function getFeatureBrands(Request $request)
    {
        $request = $request->all();
        return $this->service->getFeatureBrands($request);
    }

    public function getBrand(Request $request,$brand_id)
    {
        return $this->service->getBrand($request,$brand_id);
    }

    public function getBrands()
    {
        return $this->service->getBrands();
    }

    public function getCategoryBrands(Request $request,$cat_id)
    {
        $request = $request->all();
        return $this->service->getCategoryBrands($request,$cat_id);
    }

}
