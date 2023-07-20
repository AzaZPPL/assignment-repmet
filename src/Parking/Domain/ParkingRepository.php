<?php

namespace Temperworks\Codechallenge\Parking\Domain;

interface ParkingRepository
{
    public function park(Vehicle $vehicle): void;

    public function depart(Vehicle $vehicle): void;

    public function isParked(VehicleIdentifier $identifier): bool;

    public function isFull(): bool;
}