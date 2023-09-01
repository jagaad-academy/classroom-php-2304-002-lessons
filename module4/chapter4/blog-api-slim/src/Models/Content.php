<?php

namespace BlogAPiSlim\Models;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Content
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct(private string $content)
    {
        $this->content = filter_var($this->content, FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        Assertion::notEmpty($this->content, 'The content can\'t be empty');
        Assertion::minLength($this->content, 5, 'The content must be minimum 5 characters.');
    }

    public function toString(): string
    {
        return $this->content;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
