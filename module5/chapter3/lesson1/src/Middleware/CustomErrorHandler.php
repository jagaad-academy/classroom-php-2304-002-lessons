<?php

declare(strict_types=1);

namespace SimpleShop\Middleware;

use DomainException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use SimpleShop\Exception\DuplicatedProductException;
use Slim\App;
use Throwable;

final class CustomErrorHandler
{
    public function __construct(private App $app)
    {
    }

    public function __invoke(
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    ) {
        $logger?->error($exception->getMessage());

        if ($exception instanceof DuplicatedProductException) {
            $statusCode = 400;
            $payload = [
                'error' => $exception->getMessage(),
                'code' => 'domain_exception',
                'id' => 'duplicated_product_name',
            ];
        } else if ($exception instanceof DomainException) {
            $statusCode = 400;
            $payload = [
                'error' => $exception->getMessage(),
                'code' => 'domain_exception',
            ];
        } else {
            $statusCode = 500;
            $payload = [
                'error' => 'Oops... Something went wrong, please try again later.',
                'code' => 'internal_error',
            ];
        }

        if ($displayErrorDetails) {
            $payload['details'] = $exception->getMessage();
            $payload['trace'] = $exception->getTrace();
        }

        $response = $this->app->getResponseFactory()->createResponse();
        $response->getBody()->write(
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );

        return $response->withStatus($statusCode);
    }
}
