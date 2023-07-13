<?php

namespace OnlineStoreProject\Entities;

use mysqli;

abstract class A_Entities implements I_Entities
{
    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $mysqli = new mysqli(
            DB_HOST,
            DB_USER,
            DB_USER_PASS,
            DB_NAME
        );

        // check connection
        if ($mysqli->connect_errno) {
            throw new \Exception('Failed to connect to MySQL: ' . $mysqli->connect_error);
        }
    }
}
