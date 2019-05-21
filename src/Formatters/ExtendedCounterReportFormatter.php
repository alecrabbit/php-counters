<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\Formatters\Core\AbstractFormatter;

class ExtendedCounterReportFormatter extends AbstractFormatter
{
    public function format(): string
    {
        return get_class($this);
    }
}
