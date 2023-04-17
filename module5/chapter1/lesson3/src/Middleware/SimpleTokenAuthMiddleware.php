<?php

declare(strict_types=1);

namespace TokenLesson\Middleware;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Request;

final class SimpleTokenAuthMiddleware
{
    public function __invoke(Request $request, RequestHandlerInterface $handler): JsonResponse|ResponseInterface
    {
        $token = $_ENV['API_TOKEN'] ?? null;
        $clientToken = $request->getQueryParams()['token'] ?? null;

        if ($token === null || $clientToken !== $token) {
            return new JsonResponse(['message' => 'not authorized'], 401);
        }

        return $handler->handle($request);
    }
}