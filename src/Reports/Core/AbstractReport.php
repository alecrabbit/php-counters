<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Formatters\Core\Formattable;

abstract class AbstractReport extends Formattable
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
            return $this->formatter->format($this);
        }
        return 'ERROR: no formatter';
    }

    /**
     * @return null|FormatterInterface
     */
    public function getFormatter(): ?FormatterInterface
    {
        return $this->formatter;
    }
}
