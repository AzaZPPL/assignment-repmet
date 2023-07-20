<?php

namespace Temperworks\Codechallenge\Tests;

use Temperworks\Codechallenge\Parking\Infrastructure\Repositories\InMemoryParkingRepository;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected static function createInMemoryParkingRepository(
        int $maxSlots,
        array $parkedCars
    ): InMemoryParkingRepository {
        $repository = new InMemoryParkingRepository($maxSlots);

        foreach ($parkedCars as $car) {
            $repository->park($car);
        }

        return $repository;
    }
}