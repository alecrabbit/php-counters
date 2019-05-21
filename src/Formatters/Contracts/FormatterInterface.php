<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Contracts;

interface FormatterInterface
{
    public function format(): string;
}
