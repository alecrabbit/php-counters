<?php declare(strict_types=1);

use AlecRabbit\Counters\SimpleCounter;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();

$counter = new SimpleCounter();
$counter->bump(2);
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
$counter->bump(2);
//$counterReport = $counter->report();
echo $counterReport . PHP_EOL;


$counter = new SimpleCounter('Iter');
$counter->setStep(2);
$counter->bump(2);
$counter->bump(2);
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
