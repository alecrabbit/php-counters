<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractFormatter implements FormatterInterface
{
    public function format(): string
    {
        return '<empty>';
    }
}
