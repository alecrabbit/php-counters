<?php declare(strict_types=1);

namespace AlecRabbit\Counters\Core\Traits;

use AlecRabbit\Traits\GettableName;
use AlecRabbit\Traits\Startable;

trait SimpleCounterFields
{
    use GettableName, Startable;

    /** @var int */
    protected $value = 0;

    /** @var int */
    protected $initialValue = 0;

    /** @var int */
    protected $step = 1;

    /** @var int */
    protected $bumped = 0;

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getInitialValue(): int
    {
        return $this->initialValue;
    }

    /**
     * @return int
     */
    public function getStep(): int
    {
        return $this->step;
    }

    /**
     * @return int
     */
    public function getBumped(): int
    {
        return $this->bumped;
    }
}
