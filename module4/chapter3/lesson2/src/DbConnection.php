<?php

namespace RestApi;

class DbConnection
{
    public static function connect(): \PDO
    {
        return new \PDO('mysql:host=localhost;dbname=restapi', 'root', '');
    }
}
