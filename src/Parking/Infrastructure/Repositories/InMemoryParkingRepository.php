<?php

namespace Rempetworks\Codechallenge\Parking\Infrastructure\Repositories;

use Rempetworks\Codechallenge\Parking\Domain\ParkingRepository;
use Rempetworks\Codechallenge\Parking\Domain\Vehicle;
use Rempetworks\Codechallenge\Parking\Domain\VehicleIdentifier;

final class InMemoryParkingRepository implements ParkingRepository
{
    private array $parkingSlots;
    private int $maxSlots;

    public function __construct(int $maxSlots)
    {
        $this->maxSlots = $maxSlots;
        $this->parkingSlots = [];
    }

    public function park(Vehicle $vehicle): void
    {
        if (!$this->isFull() && !$this->isParked($vehicle->getIdentifier())) {
            $this->parkingSlots[] = $vehicle;
        }
    }

    public function depart(Vehicle $vehicle): void
    {
        $this->parkingSlots = array_filter(
            $this->parkingSlots,
            fn($parkedCar) => $vehicle->getIdentifier() !== $parkedCar->getIdentifier()
        );
    }

    public function isParked(VehicleIdentifier $identifier): bool
    {
        foreach ($this->parkingSlots as $parkedVehicle) {
            if ($identifier->toString() === $parkedVehicle->getIdentifier()->toString()) {
                return true;
            }
        }

        return false;
    }

    public function isFull(): bool
    {
        return count($this->parkingSlots) >= $this->maxSlots;
    }
}