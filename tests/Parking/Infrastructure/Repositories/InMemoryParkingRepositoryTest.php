<?php

namespace Temperworks\Codechallenge\Tests\Parking\Infrastructure\Repositories;

use Temperworks\Codechallenge\Parking\Domain\Models\Car;
use Temperworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Temperworks\Codechallenge\Parking\Infrastructure\Repositories\InMemoryParkingRepository;
use Temperworks\Codechallenge\Tests\TestCase;

class InMemoryParkingRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function can_park_vehicle(): void
    {
        $repository = new InMemoryParkingRepository(1);

        $car = new Car(LicensePlate::fromString('J-644-RK'));

        $repository->park($car);

        $this->assertTrue($repository->isParked($car->getIdentifier()));
    }

    /**
     * @test
     */
    public function can_depart_vehicle(): void
    {
        $repository = new InMemoryParkingRepository(1);

        $car = new Car(LicensePlate::fromString('J-644-RK'));

        $repository->park($car);
        $repository->depart($car);

        $this->assertFalse($repository->isParked($car->getIdentifier()));
    }

    /**
     * @test
     */
    public function can_check_if_parking_is_full(): void
    {
        $repository = new InMemoryParkingRepository(1);

        $car = new Car(LicensePlate::fromString('J-644-RK'));

        $repository->park($car);

        $this->assertTrue($repository->isFull());
    }
}