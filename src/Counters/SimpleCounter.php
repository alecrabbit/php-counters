<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\SimpleCounterReport;

class SimpleCounter extends AbstractCounter
{
    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        parent::__construct(
            $reportClass ?? SimpleCounterReport::class,
            $formatterClass ?? SimpleCounterReportFormatter::class
        );
    }
}
