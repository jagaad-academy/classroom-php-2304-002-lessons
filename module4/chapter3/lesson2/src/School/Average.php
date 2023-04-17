<?php

declare(strict_types=1);

namespace RestApi\School;

class Average
{
    public function calculate(float $num1, float $num2, float $num3): float
    {
        return ($num1 + $num2 + $num3) / 3;
    }
}
