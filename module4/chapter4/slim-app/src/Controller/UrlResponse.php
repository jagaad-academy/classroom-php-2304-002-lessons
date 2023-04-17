<?php

declare(strict_types=1);

namespace ShortenUrl\Controller;

use OpenApi\Annotations as OA;
use ShortenUrl\Entity\Url;

/**
 * DTO: Data Transfer Object
 *
 * @OA\Schema(schema="UrlResponse")
 */
class UrlResponse
{
    public function __construct(
        /** @OA\Property(property="id", type="string", example="e8f69951-8a11-4a99-9129-09bfd24e9edc") */
        public readonly string $id,
        /** @OA\Property(property="name", type="string", example="My long Url") */
        public readonly string $name,
        /** @OA\Property(property="shortUrl", type="string", example="http://localhost:8889/fe3d6") */
        public readonly string $shortUrl,
        /** @OA\Property(property="visits", type="integer", example="100") */
        public readonly int $visits,
        /** @OA\Property(property="lastVisit", type="string", example="2023-01-20 13:56:00") */
        public readonly ?string $lastVisit,
    ){}

    public static function fromUrl(Url $url, ?string $baseUrl = null): self
    {
        return new UrlResponse(
            $url->id()->toString(),
            $url->name()->toString(),
            $baseUrl . '/' . $url->shortUrl()->toString(),
            $url->visits(),
            $url->lastVisit()?->format('Y-m-d H:i:s'),
        );
    }
}
