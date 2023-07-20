<?php

namespace Temperworks\Codechallenge\Parking\Application\Park;

use Temperworks\Codechallenge\Parking\Domain\Models\Car;
use Temperworks\Codechallenge\Parking\Domain\ParkingRepository;
use Temperworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;

readonly class CarParker
{
    public function __construct(private ParkingRepository $parkingRepository)
    {
    }

    public function __invoke(LicensePlate $licensePlate): string
    {
        if ($this->parkingRepository->isFull()) {
            return 'Sorry, no place left.';
        }

        if ($this->parkingRepository->isParked($licensePlate)) {
            return 'Sorry, your car is already inside. How did you get out? :=)';
        }

        $this->parkingRepository->park(Car::create($licensePlate));
        return 'Welcome, please go in.';
    }
}