<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\api_controller;
use App\Services\IAuthService;
use App\Services\IDoctorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorController extends api_controller
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
    public function __construct(IDoctorService $service, ValidationHelper $validator) {


        $this->service = $service;
        $this->validator = $validator;

    }

    public function listAllDoctors(Request $request)
    {
        $request = $request->all();
        return $this->service->listAllDoctors($request);
    }

    public function getSingleDoctor(Request $request,$doctor_id)
    {
        return $this->service->getSingleDoctor($request,$doctor_id);
    }

    public function addNewSession(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $messages = [];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'session_date'      => 'required',
                'schedule' =>         "array",
            ],
            $messages
        );
        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->addNewSession($data, $user);
    }

    public function editSession(Request $request,$session_id)
    {
        $user = Auth::user();
        $data = $request->all();
        $user = Auth::user();
        $messages = [];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->all(),
            [
                'session_date'      => 'required',
                'time_from' =>         "required",
                'time_to' =>           "required"
            ],
            $messages
        );
        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->editSession($data, $user,$session_id);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $messages = [

        ];

        $validator = $this->validator->getValidationErrorsWithRequest(
            $data,
            [
                'username'      => 'required',
                'email'          => 'required|email',
                "mobile_number"   => "required",
                "age"              => "required|numeric",
                "gender"            => "required|in:male,female,prefer_not_to_say",


            ],
            $messages
        );


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);


        return $this->service->updateProfile($request, $user);

    }

    public function getDoctorBio()
    {
        $user = Auth::user();

        return $this->service->getDoctorBio($user);
    }

    public function updateDoctorBio(Request $request)
    {
        $user = Auth::user();

        return $this->service->updateDoctorBio($request, $user);
    }

    public function getDoctorRatings($session_id)
    {
        $user = Auth::user();
        return $this->service->getDoctorRatings($user,$session_id);
    }

    public function listSchedule(Request $request)
    {
     return $this->service->listSchedule($request);
    }

    public function getAllRatings(Request $request)
    {
        $user = Auth::user();
        return $this->service->getAllRatings($user,$request);
    }

    public function startSession($session_id)
    {
        return $this->service->startSession($session_id);
    }

    public function joinSession($session_id,$channel_name,$token)
    {
        return $this->service->joinSession($session_id,$channel_name,$token);
    }

    public function updateSessionStatus(Request $request)
    {
        return $this->service->updateSessionStatus($request);
    }

    public function afterSessionActions(Request $request,$session_id)
    {
        return $this->service->afterSessionActions($request,$session_id);

    }

    public function getBookedDoctorSessionsHome(Request $request)
    {
        return $this->service->getBookedDoctorSessionsHome($request);

    }

    public function getDoctorWallet()
    {
        return $this->service->getDoctorWallet();
    }


}
