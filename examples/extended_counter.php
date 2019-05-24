<?php declare(strict_types=1);

use AlecRabbit\Counters\ExtendedCounter;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();

$counter = new ExtendedCounter();
$counter->bump(2);
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
$counter->bump(2);
//$counterReport = $counter->report();
echo $counterReport . PHP_EOL;


$counter = new ExtendedCounter('Iter');
$counter->setStep(2);
$counter->bump(3);
$counter->bumpBack();
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
