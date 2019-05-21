<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractCounterReport extends AbstractReport
{
    protected $counter;

    /**
     * AbstractCounterReport constructor.
     * @param FormatterInterface $formatter
     * @param AbstractCounter $counter
     */
    public function __construct(FormatterInterface $formatter, AbstractCounter $counter)
    {
        $this->counter = $counter;
        parent::__construct($formatter);
    }

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }
}
