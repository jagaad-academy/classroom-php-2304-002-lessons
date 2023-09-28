<?php

error_reporting(1);
require("../../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan(['../../src']);

header('Content-Type: application/json');
echo $openapi->toJson();
