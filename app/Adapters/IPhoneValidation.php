<?php

namespace App\Adapters;

interface IPhoneValidation{

    function check_valid_phone($phone_number) :array;

}