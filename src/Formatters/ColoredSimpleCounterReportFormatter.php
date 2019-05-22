<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\Formatters\Core\Formattable;

class ColoredSimpleCounterReportFormatter extends SimpleCounterReportFormatter
{
    public function format(Formattable $formattable): string
    {
        return 'colored:' . parent::format($formattable);
    }
}
