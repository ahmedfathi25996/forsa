<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Services\IAuthService;
use App\Services\ISettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingController extends api_controller
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
    public function __construct(ISettingService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }

    #region social
    public function getSocial(Request $request)
    {
        return $this->service->getSocial($request);
    }

    #endregion


    #region pages
    public function getPage(Request $request, $page_slug)
    {
        return $this->service->getPage($page_slug);
    }

    public function getPages(Request $request)
    {
        return $this->service->getPages();
    }

    #endregion


    #region plans
    public function getPlans()
    {
        return $this->service->getPlans();
    }

    public function getPlan($plan_id)
    {
        return $this->service->getPlan($plan_id);
    }
    #endregion



    #region categories

    public function getCategories(Request $request)
    {

        $request = ($request->all());

        return $this->service->getCategories($request);
    }


    #endregion


    #region languages
    public function getLanguages()
    {
        return $this->service->getLanguages();
    }
    #endregion

    #region cities
    public function cityDistrict(Request $request){

        return $this->service->cityDistrict();

    }

    #endregion


}
