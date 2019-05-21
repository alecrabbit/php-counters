<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class SimpleCounter extends AbstractCounter
{
    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        parent::__construct(
            $reportClass ?? SimpleCounterReport::class,
            $formatterClass ?? SimpleCounterReportFormatter::class
        );
    }
}
