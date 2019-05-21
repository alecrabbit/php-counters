<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

class AbstractFormatter implements FormatterInterface
{
    public function format(): string
    {
        return '<empty>';
    }
}
