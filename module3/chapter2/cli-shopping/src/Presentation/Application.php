<?php

declare(strict_types=1);

namespace Jagaad\Presentation;

use Jagaad\Presentation\Option\CheckoutOption;
use Jagaad\Presentation\Option\KeyboardOption;
use Jagaad\Presentation\Option\LaptopOption;
use Jagaad\Presentation\Option\MonitorOption;
use Jagaad\Presentation\Option\MouseOption;
use Jagaad\Shop\Cart;

final class Application
{
    public function run(): void
    {
        $cart = new Cart();

        $terminal = new Terminal();
        $terminal->addOption(new LaptopOption($cart));
        $terminal->addOption(new KeyboardOption($cart));
        $terminal->addOption(new MonitorOption($cart));
        $terminal->addOption(new MouseOption($cart));
        $terminal->addOption(new CheckoutOption($cart));
        $terminal->execute();
    }
}
