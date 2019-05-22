<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\SimpleCounterReport;

class SimpleCounter extends AbstractCounter
{
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultBindings(
            SimpleCounterReport::class,
            SimpleCounterReportFormatter::class);
    }
}
