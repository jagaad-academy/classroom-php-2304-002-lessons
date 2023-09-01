<?php
declare(strict_types=1);
namespace BlogAPiSlim\Models;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Title
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct(private readonly string $title)
    {
        Assertion::minLength($this->title, 5, 'The title must be minimum 5 characters.');
        Assertion::string($this->title, "Title must be a string.");
    }

    public function toString(): string
    {
        return $this->title;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
