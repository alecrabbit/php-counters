<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;

class ExtendedCounter extends AbstractCounter
{
    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        parent::__construct(
            $reportClass ?? ExtendedCounterReport::class,
            $formatterClass ?? ExtendedCounterReportFormatter::class
        );
    }
}
