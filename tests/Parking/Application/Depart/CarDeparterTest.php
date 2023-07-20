<?php

namespace Temperworks\Codechallenge\Tests\Parking\Application\Depart;

use Temperworks\Codechallenge\Parking\Application\Depart\CarDeparter;
use Temperworks\Codechallenge\Parking\Domain\Models\Car;
use Temperworks\Codechallenge\Parking\Domain\ParkingRepository;
use Temperworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Temperworks\Codechallenge\Tests\TestCase;

class CarDeparterTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideCarsLeaving
     */
    public function can_depart_car(ParkingRepository $repository, Car $leavingCar, string $expected): void
    {
        $carDeparter = new CarDeparter($repository);

        $this->assertEquals($expected, $carDeparter($leavingCar->getIdentifier()));
    }

    public static function provideCarsLeaving(): iterable
    {
        yield '1 car parked with 1 known car leaving' => [
            self::createInMemoryParkingRepository(1, [
                Car::create(LicensePlate::fromString('J-644-RK'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Thank you for parking with us, have a nice day!'
        ];
        yield '1 car parked with 1 unknown car trying to leave' => [
            self::createInMemoryParkingRepository(1, [
                Car::create(LicensePlate::fromString('H-404-NR'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Sorry, could not find your car. How did you get in? :=)'
        ];
        yield '3 car parked with 1 known car leaving' => [
            self::createInMemoryParkingRepository(3, [
                Car::create(LicensePlate::fromString('J-644-RK')),
                Car::create(LicensePlate::fromString('H-404-NR')),
                Car::create(LicensePlate::fromString('67-DV-FB'))
            ]),
            Car::create(LicensePlate::fromString('J-644-RK')),
            'Thank you for parking with us, have a nice day!'
        ];
    }
}