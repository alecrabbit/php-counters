<?php declare(strict_types=1);

use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Formatters\ColoredExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;
use Illuminate\Container\Container;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();

//$container = Container::getInstance();
//$container
//    ->when(ExtendedCounterReport::class)
//    ->needs(ExtendedCounterReportFormatter::class)
//    ->give(ColoredExtendedCounterReportFormatter::class);

$counter= new SimpleCounter();
$extendedCounter= new ExtendedCounter();
$extendedCounter->setFormatter(ColoredExtendedCounterReportFormatter::class);
dump((string)$counter->report());
dump((string)$extendedCounter->report());