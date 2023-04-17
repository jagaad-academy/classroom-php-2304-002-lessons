<?php

declare(strict_types=1);

namespace ShortenUrl\Entity;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Ramsey\Uuid\Uuid;

final class ShortUrl
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct(private readonly string $shortUrl)
    {
        Assertion::length($this->shortUrl, 5, 'Short url size should be 5');
    }

    /**
     * @throws AssertionFailedException
     */
    public static function newShortUrl(): self
    {
        return new self(substr(Uuid::uuid4()->toString(), 0, 5));
    }

    public function toString(): string
    {
        return $this->shortUrl;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}