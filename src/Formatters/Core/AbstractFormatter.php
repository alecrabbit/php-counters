<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractFormatter implements FormatterInterface
{
    /** {@inheritDoc} */
    public function __construct(?int $options = null)
    {
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
