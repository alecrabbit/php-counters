<?php declare(strict_types=1);

use AlecRabbit\Experiment\ExtendedCounter;
use AlecRabbit\Experiment\SimpleCounter;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();


$counter= new SimpleCounter();
$extendedCounter= new ExtendedCounter();
dump((string)$counter->report());
dump((string)$extendedCounter->report());