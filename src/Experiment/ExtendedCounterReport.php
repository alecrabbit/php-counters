<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class ExtendedCounterReport extends AbstractReport
{
    private $counter;
    /**
     * SimpleCounterReport constructor.
     * @param ExtendedCounterReportFormatter $formatter
     * @param $counter
     */
    public function __construct(ExtendedCounterReportFormatter $formatter, $counter)
    {
        $this->counter = $counter;
        parent::__construct();
        $this->formatter = $formatter;
    }

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }
}
