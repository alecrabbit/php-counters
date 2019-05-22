<?php declare(strict_types=1);

namespace AlecRabbit\Reports;

use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;
use function AlecRabbit\typeOf;

class ExtendedCounterReport extends AbstractCounterReport
{
    /** {@inheritDoc} */
    protected function extractDataFrom(AbstractReportable $reportable = null): array
    {
        if ($reportable instanceof ExtendedCounter) {
            $data = [];
            $data['name'] = $reportable->getName();
            $data['value'] = $reportable->getValue();
            $data['step'] = $reportable->getStep();
            $data['started'] = $reportable->isStarted();
            $data['initialValue'] = $reportable->getInitialValue();
            $data['bumped'] = $reportable->getBumped();
            $data['max'] = $reportable->getMax();
            $data['min'] = $reportable->getMin();
            $data['path'] = $reportable->getPath();
            $data['length'] = $reportable->getLength();
            $data['diff'] = $reportable->getDiff();
            $data['bumpedBack'] = $reportable->getBumpedBack();
            return $data;
        }
        throw new \InvalidArgumentException(
            'Expected ' . ExtendedCounter::class . ' got ' . typeOf($reportable)
        );
    }
}
