<?php declare(strict_types=1);

use AlecRabbit\Experiment\ExtendedCounter;
use AlecRabbit\Experiment\ExtendedCounterReport;
use AlecRabbit\Experiment\ExtendedCounterReportFormatter;
use AlecRabbit\Experiment\HtmlExtendedCounterReportFormatter;
use AlecRabbit\Experiment\SimpleCounter;
use Illuminate\Container\Container;
use NunoMaduro\Collision\Provider;

require_once __DIR__ . '/../tests/bootstrap.php';

(new Provider)->register();

$container = Container::getInstance();
$container
    ->when(ExtendedCounterReport::class)
    ->needs(ExtendedCounterReportFormatter::class)
    ->give(HtmlExtendedCounterReportFormatter::class);

$counter= new SimpleCounter();
$extendedCounter= new ExtendedCounter();
$extendedCounter->setFormatterClass(HtmlExtendedCounterReportFormatter::class);
dump((string)$counter->report());
dump((string)$extendedCounter->report());