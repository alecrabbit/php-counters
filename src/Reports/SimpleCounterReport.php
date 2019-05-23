<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;

class SimpleCounterReport extends AbstractCounterReport
{
    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): void
    {
        $this->data = [];
        if ($reportable instanceof SimpleCounter) {
            $this->data['name'] = $reportable->getName();
            $this->data['value'] = $reportable->getValue();
            $this->data['step'] = $reportable->getStep();
            $this->data['started'] = $reportable->isStarted();
            $this->data['initialValue'] = $reportable->getInitialValue();
            $this->data['bumped'] = $reportable->getBumped();
        }
    }
}
