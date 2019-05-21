<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class ExtendedCounterReport extends AbstractReport
{
    /**
     * SimpleCounterReport constructor.
     * @param ExtendedCounterReportFormatter $formatter
     */
    public function __construct(ExtendedCounterReportFormatter $formatter)
    {
        parent::__construct($formatter);
        $this->formatter = $formatter;
    }
}
