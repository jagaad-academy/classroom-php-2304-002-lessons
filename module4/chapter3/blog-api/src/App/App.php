<?php

namespace BlogApi\App;

class App
{

    /**
     * @return array
     */
    public static function getDataFromStream(): array
    {
        $resultDataArray = [];
        parse_str(file_get_contents("php://input"),$resultDataArray);
        return $resultDataArray;
    }
}
