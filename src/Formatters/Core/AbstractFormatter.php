<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractFormatter implements FormatterInterface
{
    /** @var int */
    protected $options;

    /** {@inheritDoc} */
    public function __construct(?int $options = null)
    {
        $this->options = $options ?? 0;
    }

    /** {@inheritDoc} */
    public function format(Formattable $formattable): string
    {
        return
            sprintf(
                '[%s]: got %s',
                get_class($this),
                get_class($formattable)
            );
    }
}
