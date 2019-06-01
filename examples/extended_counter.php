<?php declare(strict_types=1);

use AlecRabbit\Counters\ExtendedCounter;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();

$counter = new ExtendedCounter();
$counter->bump(2);
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
// Counter: 2
$counter->bump(2);
$counterReport = $counter->report(); // Uncomment this and new output will be: Count: 4
echo $counterReport . PHP_EOL;
// Counter: 2


$counter = new ExtendedCounter('Iter');
$counter->setStep(2);
$counter->bump(3);
$counter->bumpBack();
$counterReport = $counter->report();
echo $counterReport . PHP_EOL;
// Counter[Iter]: Value: 4, Step: 2, Bumped: +3 -1 , Path: 8, Length: 8, Max: 6, Min: 0, Diff: 4
