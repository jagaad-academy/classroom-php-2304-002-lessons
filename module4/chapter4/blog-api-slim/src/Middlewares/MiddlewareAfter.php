<?php

namespace BlogAPiSlim\Middlewares;

use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class MiddlewareAfter
{

    public function __construct(private readonly Container $container)
    {
    }

    /**
     * Example middleware invokable class
     *
     * @param Request        $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): ResponseInterface
    {
        $this->logResponse($handler->handle($request));

        return $handler->handle($request);
    }

    /**
     * @param  Response $response
     * @return void
     */
    public function logResponse(ResponseInterface $response): void
    {
        $headers = "HEADERS: " . json_encode($response->getHeaders()) . PHP_EOL;
        $body = "BODY: " . (string)$response->getBody() . PHP_EOL;
        $statusCode = "STATUS CODE: " . $response->getStatusCode() . PHP_EOL;
        $responseLogFileName = __DIR__ . "/../../" . $this->container->get('settings')['RESPONSE_LOG_FILE_NAME'];

        file_put_contents($responseLogFileName, $statusCode, FILE_APPEND);
        file_put_contents($responseLogFileName, $headers, FILE_APPEND);
        file_put_contents($responseLogFileName, $body, FILE_APPEND);
        file_put_contents($responseLogFileName, PHP_EOL, FILE_APPEND);
        file_put_contents($responseLogFileName, PHP_EOL, FILE_APPEND);
    }
}
