<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\Core\Traits\ExtendedCounterFields;
use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;

/**
 * Class ExtendedCounterReport
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ExtendedCounterReport extends AbstractCounterReport
{
    use ExtendedCounterFields;

    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): void
    {
        $this->data = [];
        if ($reportable instanceof ExtendedCounter) {
            $this->name = $this->data['name'] = $reportable->getName();
            $this->value = $this->data['value'] = $reportable->getValue();
            $this->step = $this->data['step'] = $reportable->getStep();
            $this->started = $this->data['started'] = $reportable->isStarted();
            $this->initialValue = $this->data['initialValue'] = $reportable->getInitialValue();
            $this->bumped = $this->data['bumped'] = $reportable->getBumped();
            $this->max = $this->data['max'] = $reportable->getMax();
            $this->min = $this->data['min'] = $reportable->getMin();
            $this->path = $this->data['path'] = $reportable->getPath();
            $this->length = $this->data['length'] = $reportable->getLength();
            $this->diff = $this->data['diff'] = $reportable->getDiff();
            $this->bumpedBack = $this->data['bumpedBack'] = $reportable->getBumpedBack();
        }
    }
}
