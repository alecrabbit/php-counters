<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class HtmlExtendedCounterReportFormatter extends ExtendedCounterReportFormatter
{
    public function format(): string
    {
        return '<b>' . get_class($this) . '</b>';
    }
}
