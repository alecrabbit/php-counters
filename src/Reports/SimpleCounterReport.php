<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;

class SimpleCounterReport extends AbstractCounterReport
{
    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): array
    {
        if ($reportable instanceof SimpleCounter) {
            return [];
        }
        if (is_object($reportable)) {
            $type = get_class($reportable);
        } else {
            $type = gettype($reportable);
        }
        throw new \InvalidArgumentException(
            'Expected ' . SimpleCounter::class . ' got ' . $type
        );
    }
}
