<?php

declare(strict_types=1);

namespace ShortenUrl\Entity;

use Assert\AssertionFailedException;
use DateTimeImmutable;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Url
{
    private int $visits;
    private ?DateTimeImmutable $lastVisit;

    public function __construct(
        private UuidInterface $id,
        private Name $name,
        private UrlValue $url,
        private ShortUrl $shortUrl,
    ) {
        $this->visits = 0;
        $this->lastVisit = null;
    }

    /**
     * @throws AssertionFailedException
     * @throws Exception
     */
    public static function populate(array $data): self
    {
        $self = new self(
            Uuid::fromString($data['id']),
            new Name($data['name']),
            new UrlValue($data['url']),
            new ShortUrl($data['short_url']),
        );
        $self->visits = $data['visits_count'];
        $self->lastVisit = $data['last_visit'] !== null
            ? new DateTimeImmutable($data['last_visit'])
            : null;
        return $self;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function url(): UrlValue
    {
        return $this->url;
    }

    public function shortUrl(): ShortUrl
    {
        return $this->shortUrl;
    }

    public function visits(): int
    {
        return $this->visits;
    }

    public function lastVisit(): ?DateTimeImmutable
    {
        return $this->lastVisit;
    }

    public function visited(): void
    {
        $this->visits++;
        $this->lastVisit = new DateTimeImmutable('now');
    }
}
