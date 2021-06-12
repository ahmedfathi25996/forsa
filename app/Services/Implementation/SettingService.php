<?php

namespace App\Services\Implementation;

use App\Adapters\ISettingAdapter;
use App\Helpers\MessageHandleHelper;
use App\helpers\utility;
use App\Http\Controllers\Controller;
use App\Services\ISettingService;
use App\Transformers\SettingTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;

class SettingService   implements ISettingService {

    protected $adapter;
    protected $transformer;

    public function __construct(ISettingAdapter $adapter, MessageHandleHelper $messageHandle, SettingTransformer $settingTransformer = null) {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;
        $this->transformer = $settingTransformer;
    }

    #region social
    public function getSocial(){
        $data = $this->adapter->getSocial();

        $data = $this->transformer->transformSocial($data);
        return $this->messageHandler->getJsonSuccessResponse("", $data);
    }
    #endregion



    #region pages
    public function getPage($page_slug)
    {
       $data = $this->adapter->getPage($page_slug);
        $data = $data[0];


        if (!$data)
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("setting.page_not_exist"));


        $pageData = $this->transformer->transformPages($data);


        return $this->messageHandler->getJsonSuccessResponse("", $pageData);

    }



    public function getPages()
    {
        $data = $this->adapter->getPages('default');

        $pageData = $this->transformer->transformAllPages($data);

        return $this->messageHandler->getJsonSuccessResponse("", $pageData);

    }

    #endregion


    #region categories

    public function getCategories($request)
    {
        $categories = $this->adapter->getCategories($request);

        $result = $this->transformer->transformCategories($categories);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }
    #endregion


    #region plans
    public function getPlans()
    {
        $plans = $this->adapter->getPlans();

        $result = $this->transformer->transformAllPlans($plans->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getPlan($plan_id)
    {
        $data = $this->adapter->getPlan($plan_id);
        $data = $data[0];
        if (!is_object($data))
            return $this->messageHandler->getJsonNotFoundErrorResponse(\Illuminate\Support\Facades\Lang::get("setting.page_not_exist"));

        $result = $this->transformer->transformSinglePlan($data);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }
    #endregion


    #region languages
    public function getLanguages()
    {

        $langs = $this->adapter->getLanguages();

        $langs = $this->transformer->transformLanguages($langs);

        return $this->messageHandler->getJsonSuccessResponse("", $langs);

    }
    #endregion


    #region cities
    public function cityDistrict(){
        $data = $this->adapter->cityDistrict();
        $cities = $this->transformer->transformCityData($data);
        return $this->messageHandler->getJsonSuccessResponse("", $cities);

    }
    #endregion


}
