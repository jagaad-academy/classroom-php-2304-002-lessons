<?php

declare(strict_types=1);

namespace ShortenUrl\Repository;

use Ramsey\Uuid\UuidInterface;
use ShortenUrl\Entity\Url;

interface UrlRepository
{
    public function store(Url $url): void;
    /** @return Url[] */
    public function all(): array;
    public function findByShortUrl(string $shortUrl): Url;
    public function find(UuidInterface $id): Url;
}
