<?php

/**
 * CustomErrorHandler.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Middleware;

use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Psr\Log\LoggerInterface;
use Slim\App;
use Slim\Psr7\Request;
use Throwable;

final class CustomErrorHandler
{
    public function __construct(private App $app){}

    public function __invoke(
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    )
    {
        $logger?->error($exception->getMessage());

        if($exception instanceof ORMException){
            $payload = [];
            $statusCode = 500;
        } else if ($exception instanceof OptimisticLockException) {
            $payload = [];
            $statusCode = 500;
        }

        //@TODO: NotSupported

        $payload = [];
        $statusCode = 200;

        $response = $this->app->getResponseFactory()->createResponse();
        $response->getBody()->write(
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );

        return $response->withStatus($statusCode);

    }
}
