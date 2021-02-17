<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Services\IAuthService;
use App\Services\IOfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;


class OfferController extends api_controller
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
    public function __construct(IOfferService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }

    public function listAllOffers(Request $request)
    {
        $request = $request->all();
        return $this->service->listAllOffers($request);
    }

    public function getHotOffers(Request $request)
    {
        $request = $request->all();
        return $this->service->getHotOffers($request);
    }

    public function getOffers(Request $request)
    {
        $request = $request->all();
        return $this->service->getOffers($request);
    }

    public function getSingleOffer($offer_id)
    {
        return $this->service->getSingleOffer($offer_id);
    }


    public function useOffer(Request $request,$offer_id)
    {
        $request = $request->all();
        $user = Auth::user();
        $messages = [
            'branch_id.required'            => "branch_id is required",

        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request,
            [
                'branch_id'     => 'required',

            ],
            $messages
        );


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->useOffer($request,$user,$offer_id);
    }

    public function getNearByOffers(Request $request)
    {
        $data = $request->all();
        return $this->service->getNearByOffers($data);
    }


    public function searchOffers(Request $request)
    {
        $request = $request->all();
        $messages = [
            'keyword.required'            => Lang::get("general.search_keyword"),

        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request,
            [
                'keyword'     => 'required',

            ],
            $messages
        );


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->searchOffers($request);

    }



}
