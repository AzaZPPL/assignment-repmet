<?php

namespace Temperworks\Codechallenge\Parking\Domain\Models;

use Temperworks\Codechallenge\Parking\Domain\Vehicle;
use Temperworks\Codechallenge\Parking\Domain\VehicleIdentifier;

class Car implements Vehicle
{
    public function __construct(private readonly VehicleIdentifier $identifier)
    {
    }

    public static function create(VehicleIdentifier $identifier): self
    {
        return new self($identifier);
    }

    public function getIdentifier(): VehicleIdentifier
    {
        return $this->identifier;
    }
}