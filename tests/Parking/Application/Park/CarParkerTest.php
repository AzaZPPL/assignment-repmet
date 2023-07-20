<?php

namespace Temperworks\Codechallenge\Tests\Parking\Application\Park;

use Temperworks\Codechallenge\Parking\Application\Park\CarParker;
use Temperworks\Codechallenge\Parking\Domain\Models\Car;
use Temperworks\Codechallenge\Parking\Domain\ParkingRepository;
use Temperworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Temperworks\Codechallenge\Tests\TestCase;

class CarParkerTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideCarsLeaving
     */
    public function can_park_car(ParkingRepository $repository, Car $parkingCar, string $expected): void
    {
        $carParker = new CarParker($repository);

        $this->assertEquals($expected, $carParker($parkingCar->getIdentifier()));
    }

    public static function provideCarsLeaving(): iterable
    {
        yield 'no parking slots available and 1 car trying to park' => [
            self::createInMemoryParkingRepository(1, [
                Car::create(LicensePlate::fromString('J-644-RK'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Sorry, no place left.'
        ];
        yield '1 parking slot available with 1 car trying to park' => [
            self::createInMemoryParkingRepository(2, [
                Car::create(LicensePlate::fromString('H-404-NR'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Welcome, please go in.'
        ];
        yield '3 car parked with 1 car somehow trying to repark' => [
            self::createInMemoryParkingRepository(4, [
                Car::create(LicensePlate::fromString('J-644-RK')),
                Car::create(LicensePlate::fromString('H-404-NR')),
                Car::create(LicensePlate::fromString('67-DV-FB'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Sorry, your car is already inside. How did you get out? :=)'
        ];
    }
}