<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Presentation\Option;

class QuitOption implements Option
{
    public function key(): string
    {
        return 'Q';
    }

    public function description(): string
    {
        return 'Quit';
    }

    public function handle(): void
    {
    }
}
