<?php

namespace Rempetworks\Codechallenge\Tests\Parking\Domain\Models;

use Rempetworks\Codechallenge\Parking\Domain\Models\Car;
use Rempetworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Rempetworks\Codechallenge\Tests\TestCase;

class CarTest extends TestCase
{
        /**
        * @test
        * @dataProvider provideDifferentLicensePlates
        */
        public function can_get_car_identifier(LicensePlate $licensePlate)
        {
            $car = Car::create($licensePlate);

            $this->assertEquals($licensePlate, $car->getIdentifier());
        }

        public static function provideDifferentLicensePlates(): iterable
        {
            yield 'Car 1 (Mercedes E Class)' => [LicensePlate::fromString('J-644-RK')];
            yield 'Car 2 (Volkswagen Bora)' => [LicensePlate::fromString('67-DV-FB')];
            yield 'Car 3 (Nissan Leaf)' => [LicensePlate::fromString('H-404-NR')];
        }
}