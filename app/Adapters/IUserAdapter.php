<?php

namespace App\Adapters;
interface IUserAdapter
{

    /**
     * @param $data
     * @return mixed
     */
    function createUser($data);

    /**
     * @param $data
     * @param $filed
     * @return mixed
     */
    function updateUser($data, $filed);

    /**
     * @param $email
     * @return mixed
     */
    function deleteUser($filed);

}
