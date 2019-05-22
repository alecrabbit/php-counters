<?php declare(strict_types=1);

use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Formatters\ColoredSimpleCounterReportFormatter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Formatters\ColoredExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;
use Illuminate\Container\Container;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();


$counter= new SimpleCounter();
$extendedCounter= new ExtendedCounter('name');
$counterReport = $counter->report();
$extendedCounterReport = $extendedCounter->report();
echo $counterReport . PHP_EOL;
echo $extendedCounterReport . PHP_EOL;
$counter->setFormatter(ColoredSimpleCounterReportFormatter::class);
$extendedCounter->setFormatter(ColoredExtendedCounterReportFormatter::class);
echo $counterReport . PHP_EOL;
echo $extendedCounterReport . PHP_EOL;
$counterReport = $counter->report();
$extendedCounterReport = $extendedCounter->report();
echo $counterReport . PHP_EOL;
echo $extendedCounterReport . PHP_EOL;
