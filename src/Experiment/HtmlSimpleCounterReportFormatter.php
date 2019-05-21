<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class HtmlSimpleCounterReportFormatter extends SimpleCounterReportFormatter
{
    public function format(): string
    {
        return '<b>' . get_class($this) . '</b>';
    }
}
