<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class api_controller extends Controller
{

    const DEFAULT_LIMIT_PER_PAGE = 15;

    private $success = 1;
    private $error = 0;

    public function __construct()
    {


    }

    public function getErrorResponse($msg,$data)
    {
        $response=[
            'Status'    => $this->api_error,
            'Code'      => 400,
            'Message'   => $msg,
            'Data'      => null,
        ];
        if($data)
        {
            $response['Errors'] = $data;
        }
        else{
            $response['Errors'] = null;
        }
        return $response;
    }
    public function getJsonSuccessResponse($msg = "", $data = []) {
        return response()->json(
            [
                'Status'    => $this->api_success,
                'Message'   => $msg,
                'Code'      => 200,
                'Data'      => $data,
                'Errors'    => null
            ]
            , Response::HTTP_OK);
    }

    public function getJsonNotAuthorizedResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_FORBIDDEN);
    }

    public function postJsonSuccessResponse($msg = "", $data = []) {
        return response()->json(
            [
                'Status'    => $this->api_success,
                'Message'   => $msg,
                'Code'      => 200,
                'Data'      => $data,
                'Errors'    => null
            ], Response::HTTP_CREATED);
    }

    public function getJsonLogicalErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_CONFLICT);
    }

    public function getJsonNotFoundErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_NOT_FOUND);
    }

    public function getJsonSessionExpiredErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }

    public function getJsonValidationErrorResponse($msg = "Validation Errors", $data = []) {

        if(isset($data[0]) && isset($data[0]["errorMsg"]))
        {
            $msg = $data[0]["errorMsg"];
        }

        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_OK);
    }

    public function getStringLength($str) {
        return strlen($str);
    }

    public function checkValidationRules($request, $rules) {
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->getJsonValidationErrorResponse($validator->errors()->first());
        }
        return '0';
    }

}
