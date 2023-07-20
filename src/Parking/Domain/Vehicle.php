<?php

namespace Rempetworks\Codechallenge\Parking\Domain;

interface Vehicle
{
    public function getIdentifier(): VehicleIdentifier;
}