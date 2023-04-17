<?php

declare(strict_types=1);

namespace QualityToolsExample;

use Psr\Log\LoggerInterface;

final class LoggerFactory
{
    public static function make(): LoggerInterface
    {
        // monolog example
        $log = new \Monolog\Logger('my-logger');
        $log->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__ . '/../log/all.log', \Monolog\Level::Info));
        return $log;

        // symfony
        //$log = new Logger(new StreamOutput(fopen(__DIR__ . '/../log/all.log', 'wb+')));
        //$log = new \QualityToolsExample\MyLogger();

        //return new MyLogger();
    }
}
