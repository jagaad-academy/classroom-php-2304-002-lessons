<?php

namespace BlogAPiSlim\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
class MiddlewareBefore
{
    /**
     * Example middleware invokable class
     *
     * @param  Request  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        //Authentication
//        if(!isset($_SESSION['user'])){
//            header('/v1/auth');
//        }

        //Logging requests
        $headers = "HEADERS: " . json_encode($request->getHeaders()) . PHP_EOL; // array
        $body = "BODY: " . (string)$request->getBody() . PHP_EOL; // string
        $uri = "URI: " . $request->getUri() . PHP_EOL;
        $requestLogFileName = __DIR__ . "/../../" . $_ENV['REQUESTS_LOG_FILE_NAME'];

        file_put_contents($requestLogFileName, $uri, FILE_APPEND);
        file_put_contents($requestLogFileName, $headers, FILE_APPEND);
        file_put_contents($requestLogFileName, $body, FILE_APPEND);
        file_put_contents($requestLogFileName, PHP_EOL, FILE_APPEND);
        file_put_contents($requestLogFileName, PHP_EOL, FILE_APPEND);

        return $handler->handle($request);
    }
}
