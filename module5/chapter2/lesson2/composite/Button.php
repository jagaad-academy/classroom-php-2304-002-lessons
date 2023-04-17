<?php

declare(strict_types=1);


final class Button implements Renderable
{
    public function render(): string
    {
        return '<button name="test" value="Test">Test</button>';
    }
}