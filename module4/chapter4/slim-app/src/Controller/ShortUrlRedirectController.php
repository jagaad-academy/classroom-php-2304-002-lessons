<?php

declare(strict_types=1);

namespace ShortenUrl\Controller;

use DI\Container;
use Laminas\Diactoros\Response\RedirectResponse;
use ShortenUrl\Repository\UrlRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ShortUrlRedirectController
{
    private UrlRepository $urlRepository;

    public function __construct(Container $container)
    {
        $this->urlRepository = $container->get(UrlRepository::class);
    }

    public function __invoke(Request $request, Response $response, $args): RedirectResponse
    {
        $url = $this->urlRepository->findByShortUrl($args['short-url']);

        $url->visited();
        $this->urlRepository->store($url);

        return new RedirectResponse($url->url()->toString());
    }
}
