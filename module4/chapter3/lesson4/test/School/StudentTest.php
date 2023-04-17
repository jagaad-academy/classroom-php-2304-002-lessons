<?php

declare(strict_types=1);

namespace RestApiTest\School;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use RestApi\School\Student;

final class StudentTest extends TestCase
{
    /** @test */
    public function constructShouldWork(): void
    {
        $name = 'test_name';
        $lastName = 'test_lastname';
        $country = 'test_country';

        $instance = new Student($name, $lastName, $country);

        self::assertTrue((bool)$instance, 'Entity Student instantiation failed');
    }

    /**
     * @dataProvider studentDataProvider
     * @test
     */
    public function gettersShouldWork($name, $lastName, $country): void
    {
        $student = new Student($name, $lastName, $country);

        self::assertEquals($name, $student->name());
        self::assertEquals($lastName, $student->lastName());
        self::assertEquals($country, $student->country());
    }

    private function studentDataProvider(): array
    {
        $faker = Factory::create();

        $fakeStudentsArgs = [];
        for ($i=0; $i<10; $i++) {
            $fakeStudentsArgs[] = [$faker->name, $faker->lastName, $faker->country];
        }

        return $fakeStudentsArgs;
    }
}
