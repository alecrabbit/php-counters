<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\Formatters\Core\AbstractFormatter;
use AlecRabbit\Formatters\Core\Formattable;

class SimpleCounterReportFormatter extends AbstractFormatter
{
    public function format(Formattable $formattable): string
    {
        return get_class($formattable);
    }
}
