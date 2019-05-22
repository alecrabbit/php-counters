<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\SimpleCounterReport;

class SimpleCounter extends AbstractCounter
{
    /** {@inheritDoc} */
    public function __construct(?string $name = null, ?int $step = null, int $initialValue = 0)
    {
        parent::__construct($name, $step, $initialValue);
        $this->setBindings(
            SimpleCounterReport::class,
            SimpleCounterReportFormatter::class);
    }
}
