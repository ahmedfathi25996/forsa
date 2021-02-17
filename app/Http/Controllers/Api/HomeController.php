<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Services\IAuthService;
use App\Services\IHomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;


class HomeController extends api_controller
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
    public function __construct(IHomeService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }

    public function getHome(Request $request)
    {
        $request = $request->all();
        return $this->service->getHome($request);
    }

}
