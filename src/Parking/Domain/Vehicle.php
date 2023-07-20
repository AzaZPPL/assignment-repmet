<?php

namespace Temperworks\Codechallenge\Parking\Domain;

interface Vehicle
{
    public function getIdentifier(): VehicleIdentifier;
}