<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;

class ExtendedCounterReport extends AbstractCounterReport
{
    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): void
    {
        $this->data = [];
        if ($reportable instanceof ExtendedCounter) {
            $this->data['name'] = $reportable->getName();
            $this->data['value'] = $reportable->getValue();
            $this->data['step'] = $reportable->getStep();
            $this->data['started'] = $reportable->isStarted();
            $this->data['initialValue'] = $reportable->getInitialValue();
            $this->data['bumped'] = $reportable->getBumped();
            $this->data['max'] = $reportable->getMax();
            $this->data['min'] = $reportable->getMin();
            $this->data['path'] = $reportable->getPath();
            $this->data['length'] = $reportable->getLength();
            $this->data['diff'] = $reportable->getDiff();
            $this->data['bumpedBack'] = $reportable->getBumpedBack();
        }
    }
}
