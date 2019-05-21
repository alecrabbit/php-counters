<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class ExtendedCounterReportFormatter extends AbstractFormatter
{
    public function format(): string
    {
        return get_class($this);
    }
}
