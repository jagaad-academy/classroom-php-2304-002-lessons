<?php

declare(strict_types=1);

namespace RestApiTest\School;

use PHPUnit\Framework\TestCase;
use RestApi\School\Average;

class AverageTest extends TestCase
{
    public function testCalculateShouldWork(): void
    {
        $average = new Average();
        $result = $average->calculate(5, 5, 5);

        self::assertEquals(5, $result, 'Invalid average result');
    }
}
