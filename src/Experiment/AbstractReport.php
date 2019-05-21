<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

abstract class AbstractReport
{
    /** @var FormatterInterface */
    protected $formatter;

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    public function __toString()
    {
        return $this->formatter->format();
    }
}
