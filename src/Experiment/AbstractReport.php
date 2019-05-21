<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

abstract class AbstractReport
{
    /** @var null|FormatterInterface */
    protected $formatter;

    public function __construct(FormatterInterface $formatter = null)
    {
        $this->formatter = $formatter;
    }

    public function __toString()
    {
        if ($this->formatter instanceof FormatterInterface) {
            return $this->formatter->format();
        }
        return 'no formatter set';
    }

    /**
     * @return null|FormatterInterface
     */
    public function getFormatter(): ?FormatterInterface
    {
        return $this->formatter;
    }
}
