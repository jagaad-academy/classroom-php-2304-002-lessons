<?php
/**
 * OpenAPIController.php
 * hennadii.shvedko
 * 01.09.2023
 */

namespace BlogAPiSlim\Controllers;
error_reporting(1);

use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Generator;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;

class OpenAPIController
{
    /**
     * @throws \JsonException
     */
    public function documentationAction(Request $request, ResponseInterface $response): ResponseInterface
    {
        $openapi = Generator::scan([__DIR__ . '/../../src']);
        return new JsonResponse(json_decode($openapi->toJson(), true, 512, JSON_THROW_ON_ERROR));
    }
}
