<?php
/**
 * BasicAuthMiddleware.php
 * hennadii.shvedko
 * 14.09.2023
 */

namespace APIAuthLesson\Middlewares;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
class APITokenAuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): JsonResponse|ResponseInterface
    {
        $token = $_ENV['API_TOKEN'];
        $queryParam = $request->getQueryParams()['token'] ?? null;

        if($token !== $queryParam) {
            return new JsonResponse(['message' => 'Authorization failed'], 401);
        }

        return $handler->handle($request);
    }
}
