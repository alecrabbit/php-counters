<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class SimpleCounterReport extends AbstractReport
{
    /**
     * SimpleCounterReport constructor.
     * @param SimpleCounterReportFormatter $formatter
     */
    public function __construct(SimpleCounterReportFormatter $formatter)
    {
        parent::__construct($formatter);
        $this->formatter = $formatter;
    }
}
