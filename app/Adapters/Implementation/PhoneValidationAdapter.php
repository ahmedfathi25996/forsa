<?php

namespace App\Adapters\Implementation;

use App\Adapters\IPhoneValidation;

class PhoneValidationAdapter implements IPhoneValidation
{

    public function check_valid_phone($phone_number) : array
    {
        $response = [
            "status"    => "error",
            "data"      => []
        ];

        try {

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $phoneGeo = \libphonenumber\PhoneNumberToTimeZonesMapper::getInstance();
            $phoneCarrier = \libphonenumber\PhoneNumberToCarrierMapper::getInstance();

            $phone_number_obj = $phoneUtil->parse($phone_number);

            $region_code = $phoneUtil->getRegionCodeForNumber($phone_number_obj);
            $number_type = $phoneUtil->getNumberType($phone_number_obj);

            $is_valid = $phoneUtil->isValidNumber($phone_number_obj);
            $is_valid_from_region = $phoneUtil->isValidNumberForRegion($phone_number_obj,$region_code);

            $example_region_number = $phoneUtil->getExampleNumber($region_code);
            $timezones = $phoneGeo->getTimeZonesForNumber($phone_number_obj);

            $carrier_name = $phoneCarrier->getNameForNumber($phone_number_obj,"en");

            if($is_valid == false || $is_valid_from_region == false)
            {
                return $response;
            }

            $data = [
                "phone_number"                      => $phone_number,
                "region_code"                       => $region_code,
                "number_type"                       => $number_type,
                "is_valid_number"                   => $is_valid,
                "is_valid_number_from_region"       => $is_valid_from_region,
                "example_region_number"             => $example_region_number->getNationalNumber(),
                "timezone"                          => (isset($timezones[0])?$timezones[0]:""),
                "carrier_name"                      => $carrier_name,
            ];

            $response = [
                "status"    => "success",
                "data"      => $data
            ];

        } catch (\libphonenumber\NumberParseException $e) {
            return $response;
        }

        return $response;

    }

}
