<?php

declare(strict_types=1);

namespace ShortenUrl\Controller;

use Assert\AssertionFailedException;
use DI\Container;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Ramsey\Uuid\Uuid;
use ShortenUrl\Entity\Name;
use ShortenUrl\Entity\ShortUrl;
use ShortenUrl\Entity\Url;
use ShortenUrl\Entity\UrlValue;
use ShortenUrl\Repository\UrlRepository;
use ShortenUrl\Validator\UrlInputValidator;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use OpenApi\Annotations as OA;

class ShortenUrlController
{
    private UrlRepository $urlRepository;
    private string $baseUrl;

    public function __construct(Container $container)
    {
        $this->urlRepository = $container->get(UrlRepository::class);
        $this->baseUrl = $container->get('settings')['app']['domain'];
    }

    /**
     * @OA\Post(
     *     path="/v1/url/shorten",
     *     description="Shorten a URL.",
     *     tags={"ShortenUrl"},
     *     @OA\RequestBody(
     *          description="Url to be shorten.",
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="name", type="string", example="My long Url"),
     *                  @OA\Property(property="url", type="string", example="https://www.slimframework.com/docs/v4/"),
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="The shorten URL response",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/UrlResponse")
     *         )
     *     )
     * )
     * @throws JsonException
     * @throws AssertionFailedException
     */
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $inputs = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        $errors = (new UrlInputValidator())->validate($inputs);
        if (count($errors)) {
            $output = [
                'status' => 'error',
                'messages' => $errors,
            ];
            return new JsonResponse($output, 400);
        }

        $url = new Url(
            Uuid::uuid4(),
            new Name($inputs['name']),
            new UrlValue($inputs['url']),
            ShortUrl::newShortUrl()
        );
        $this->urlRepository->store($url);

        $output = UrlResponse::fromUrl($url, $this->baseUrl);

        return new JsonResponse($output);
    }
}
