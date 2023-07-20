<?php

namespace Temperworks\Codechallenge\Parking\Domain;

interface VehicleIdentifier
{
    public function toString(): string;
}