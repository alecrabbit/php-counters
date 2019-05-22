<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;

class ExtendedCounter extends AbstractCounter
{
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultBindings(
            ExtendedCounterReport::class,
            ExtendedCounterReportFormatter::class
        );
    }
}
