<?php

namespace App\Services;

interface IAuthService {

    function login($data);

    function register($data);

}
