<?php

namespace BlogAPiSlim\Middlewares;

use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
class MiddlewareBefore
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
        //Authentication
        //        if(!isset($_SESSION['user'])){
        //            header('/v1/auth');
        //        }

        //Logging requests
        $headers = "HEADERS: " . json_encode($request->getHeaders()) . PHP_EOL; // array
        $body = "BODY: " . (string)$request->getBody() . PHP_EOL; // string
        $uri = "URI: " . $request->getUri() . PHP_EOL;
        $requestLogFileName = __DIR__ . "/../../" . $this->container->get('settings')['REQUESTS_LOG_FILE_NAME'];

        file_put_contents($requestLogFileName, $uri, FILE_APPEND);
        file_put_contents($requestLogFileName, $headers, FILE_APPEND);
        file_put_contents($requestLogFileName, $body, FILE_APPEND);
        file_put_contents($requestLogFileName, PHP_EOL, FILE_APPEND);
        file_put_contents($requestLogFileName, PHP_EOL, FILE_APPEND);

        return $handler->handle($request);
    }
}
