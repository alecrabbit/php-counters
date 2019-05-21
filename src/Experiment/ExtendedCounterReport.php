<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class ExtendedCounterReport extends AbstractReport
{
    /**
     * SimpleCounterReport constructor.
     * @param ExtendedCounterReportFormatter $formatter
     * @param $counter
     */
    public function __construct(ExtendedCounterReportFormatter $formatter, $counter)
    {
        dump($counter);
        parent::__construct();
        $this->formatter = $formatter;
    }
}
