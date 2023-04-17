<?php

namespace Jagaad\Presentation;

interface Option
{
    public function key(): string;
    public function description(): string;
    public function handle(): void;
}
