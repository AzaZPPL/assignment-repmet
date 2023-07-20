<?php

namespace Temperworks\Codechallenge\Parking\Application\Depart;

use Temperworks\Codechallenge\Parking\Domain\Models\Car;
use Temperworks\Codechallenge\Parking\Domain\ParkingRepository;
use Temperworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;

final readonly class CarDeparter
{
    public function __construct(private ParkingRepository $parkingRepository)
    {
    }

    public function __invoke(LicensePlate $licensePlate): string
    {
        if (!$this->parkingRepository->isParked($licensePlate)) {
            return 'Sorry, could not find your car. How did you get in? :=)';
        }

        $this->parkingRepository->depart(Car::create($licensePlate));

        return 'Thank you for parking with us, have a nice day!';
    }
}