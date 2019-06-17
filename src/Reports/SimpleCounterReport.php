<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\Core\Traits\SimpleCounterFields;
use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;

class SimpleCounterReport extends AbstractCounterReport
{
    use SimpleCounterFields;

    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): void
    {
        $this->data = [];
        if ($reportable instanceof SimpleCounter) {
            $this->name = $this->data['name'] = $reportable->getName();
            $this->value = $this->data['value'] = $reportable->getValue();
            $this->step = $this->data['step'] = $reportable->getStep();
            $this->started = $this->data['started'] = $reportable->isStarted();
            $this->initialValue = $this->data['initialValue'] = $reportable->getInitialValue();
            $this->bumped = $this->data['bumped'] = $reportable->getBumped();
        }
    }
}
