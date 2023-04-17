<?php

declare(strict_types=1);

namespace ShortenUrl\Entity;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class UrlValue
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct(private readonly string $url)
    {
        Assertion::url($this->url);
        Assertion::minLength($this->url, 10, 'Url should have min of 10 characters');
    }

    public function toString(): string
    {
        return $this->url;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
