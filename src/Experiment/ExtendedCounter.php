<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class ExtendedCounter extends AbstractCounter
{
    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        parent::__construct(
            $reportClass ?? ExtendedCounterReport::class,
            $formatterClass ?? ExtendedCounterReportFormatter::class
        );
    }
}
