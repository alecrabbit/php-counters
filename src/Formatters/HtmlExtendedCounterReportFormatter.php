<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

class HtmlExtendedCounterReportFormatter extends ExtendedCounterReportFormatter
{
    public function format(): string
    {
        return '<b>' . get_class($this) . '</b>';
    }
}
