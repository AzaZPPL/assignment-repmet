<?php

namespace Rempetworks\Codechallenge\Tests\Parking\Domain\ValueObject;

use Rempetworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Rempetworks\Codechallenge\Tests\TestCase;

class LicensePlateTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideDifferentLicensePlates
     */
    public function can_create_license_plate(string $licensePlate)
    {
        $licensePlateObj = LicensePlate::fromString($licensePlate);
        $this->assertEquals($licensePlate, $licensePlateObj->toString());
    }

    public static function provideDifferentLicensePlates(): iterable
    {
        yield 'Car 1 (Mercedes E Class)' => ['J-644-RK'];
        yield 'Car 2 (Volkswagen Bora)' => ['67-DV-FB'];
        yield 'Car 3 (Nissan Leaf)' => ['H-404-NR'];
    }
}