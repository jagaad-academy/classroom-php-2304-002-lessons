<?php

declare(strict_types=1);

namespace PdoApp\Model;

final class Author
{
    private string $country;

    public function __construct(
        private string $authorId,
        private string $name
    ) {
        $this->country = 'anywhere';
    }

    public static function populate(array $data): self
    {
        $self = new Author($data['id'], $data['name']);
        $self->country = $data['country'];
        return $self;
    }

    public function id(): string
    {
        return $this->authorId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function country(): string
    {
        return $this->country;
    }
}
