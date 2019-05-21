<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

use Illuminate\Container\Container;

class ExtendedCounter extends AbstractCounter
{
    public function __construct(string $formatterClass = null, string $reportClass = null)
    {
        parent::__construct();
        $this->defaultFormatterClass = $formatterClass ?? ExtendedCounterReportFormatter::class;
        $this->defaultReportClass = $reportClass ?? ExtendedCounterReport::class;
    }

    public function report(): AbstractReport
    {
        return Container::getInstance()->make(ExtendedCounterReport::class, ['counter' => $this]);
    }

}
