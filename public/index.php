<?php

use Rempetworks\Codechallenge\Parking\Application\Park\CarParker;
use Rempetworks\Codechallenge\Parking\Domain\ValueObject\LicensePlate;
use Rempetworks\Codechallenge\Parking\Infrastructure\Repositories\InMemoryParkingRepository;

require_once '../vendor/autoload.php';

$result = [];

$licensePlates = [
    LicensePlate::fromString('J-644-RK'),
    LicensePlate::fromString('67-DV-FB'),
    LicensePlate::fromString('H-404-NR'),
    LicensePlate::fromString('67-TSB-03'),
    LicensePlate::fromString('RS-063-B'),
    LicensePlate::fromString('AB-123-CD'),
    LicensePlate::fromString('XY-987-ZW'),
    LicensePlate::fromString('FG-456-HJ'),
    LicensePlate::fromString('KL-321-MN'),
    LicensePlate::fromString('PQ-654-RS'),
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $maxSlots = (int) $_POST['maxSlots'];
    $numCars = (int) $_POST['numCars'];

    if ($numCars > 10) {
        $numCars = 10;
    }

    $parkingRepository = new InMemoryParkingRepository($maxSlots);
    $carParker = new CarParker($parkingRepository);

    for ($i = 1; $i <= $numCars; $i++) {
        /** @var LicensePlate $licensePlate */
        $licensePlate = $licensePlates[$i - 1];

        $result[$licensePlate->toString()] = $carParker($licensePlate);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Parking Application</title>
</head>
<body>
    <h1>Parking Application</h1>

    <form method="POST" action="">
        <label for="maxSlots">Maximum Parking Slots:</label>
        <input type="number" id="maxSlots" name="maxSlots" required><br><br>

        <label for="numCars">Number of Cars:</label>
        <input type="number" id="numCars" name="numCars" required><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php if ($result): ?>
        <h2>Result:</h2>
        <ul>
            <?php foreach ($result as $carId => $message): ?>
                <li><?php echo $carId; ?>: <?php echo $message; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>