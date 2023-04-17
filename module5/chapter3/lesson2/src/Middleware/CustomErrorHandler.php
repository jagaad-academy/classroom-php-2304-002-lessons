<?php

declare(strict_types=1);

namespace SimpleShop\Middleware;

use DomainException;
use Monolog\Logger;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use SimpleShop\Exception\DuplicatedProductException;
use SimpleShop\Exception\InvalidInputException;
use Slim\App;
use Throwable;

final class CustomErrorHandler
{
    private Logger $logger;

    public function __construct(private App $app)
    {
        $this->logger = $this->app->getContainer()->get('logger');
    }

    public function __invoke(
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    ) {
        $payload = $this->getPayload($exception);

        if ($displayErrorDetails) {
            $payload['details'] = $exception->getMessage();
            $payload['trace'] = $exception->getTrace();
        }

        $response = $this->app->getResponseFactory()->createResponse();
        $response->getBody()->write(
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );

        return $response->withStatus($payload['status_code']);
    }

    private function getPayload(Throwable $exception): array
    {
        if ($exception instanceof InvalidInputException) {
            $this->logger->debug(json_encode($exception->getInputErrors()));
            return [
                'errors' => $exception->getInputErrors(),
                'code' => 'validation_exception',
                'id' => 'invalid_input_exception',
                'status_code' => 400,
            ];
        }

        if ($exception instanceof DuplicatedProductException) {
            $this->logger->info($exception->getMessage());
            return [
                'error' => $exception->getMessage(),
                'code' => 'domain_exception',
                'id' => 'duplicated_product_name',
                'status_code' => 400,
            ];
        }

        if ($exception instanceof DomainException) {
            $this->logger->info($exception->getMessage());
            return [
                'error' => $exception->getMessage(),
                'code' => 'domain_exception',
                'status_code' => 400,
            ];
        }

        $this->logger->error($exception->getMessage());
        return [
            'error' => 'Oops... Something went wrong, please try again later.',
            'code' => 'internal_error',
            'status_code' => 500,
        ];
    }
}
