<?php

declare(strict_types=1);

namespace ShortenUrl\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Ramsey\Uuid\Uuid;
use ShortenUrl\Repository\UrlRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class FindUrlController
{
    private UrlRepository $urlRepository;
    private string $baseUrl;

    public function __construct(Container $container)
    {
        $this->urlRepository = $container->get(UrlRepository::class);
        $this->baseUrl = $container->get('settings')['app']['domain'];
    }

    /**
     * @OA\Get(
     *     path="/v1/url/{id}",
     *     description="Returns a URL by ID.",
     *     tags={"ShortenUrl"},
     *     @OA\Parameter(
     *         description="ID of url to fetch",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Url response",
     *         @OA\JsonContent(ref="#/components/schemas/UrlResponse")
     *     )
     * )
     */
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $url = $this->urlRepository->find(Uuid::fromString($args['id']));
        return new JsonResponse(UrlResponse::fromUrl($url, $this->baseUrl));
    }
}
