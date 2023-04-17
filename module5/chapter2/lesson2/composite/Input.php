<?php

declare(strict_types=1);

final class Input implements Renderable
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}
