<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;
use function AlecRabbit\typeOf;

class SimpleCounterReport extends AbstractCounterReport
{
    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): array
    {
        if ($reportable instanceof SimpleCounter) {
            $data = [];
            $data['name'] = $reportable->getName();
            $data['value'] = $reportable->getValue();
            $data['step'] = $reportable->getStep();
            $data['started'] = $reportable->isStarted();
            $data['initialValue'] = $reportable->getInitialValue();
            $data['bumped'] = $reportable->getBumped();
            return $data;
        }
        throw new \InvalidArgumentException(
            'Expected ' . SimpleCounter::class . ' got ' . typeOf($reportable)
        );
    }
}
