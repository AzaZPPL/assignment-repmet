<?php

namespace Rempetworks\Codechallenge\Parking\Domain\ValueObject;

use Rempetworks\Codechallenge\Parking\Domain\VehicleIdentifier;

final class LicensePlate implements VehicleIdentifier
{
    public function __construct(private readonly string $licensePlate)
    {
        if (empty($licensePlate)) {
            throw new \InvalidArgumentException('Sorry, License plate cannot be empty');
        }
    }

    public static function fromString(string $licensePlate): self
    {
        return new self($licensePlate);
    }

    public function toString(): string
    {
        return $this->licensePlate;
    }
}