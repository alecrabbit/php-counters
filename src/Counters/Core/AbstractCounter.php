<?php declare(strict_types=1);

namespace AlecRabbit\Counters\Core;

use AlecRabbit\Counters\Core\Traits\SimpleCounterFields;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;
use Illuminate\Container\Container;

abstract class AbstractCounter extends AbstractReportable
{
    use SimpleCounterFields;

    protected const DEFAULT_STEP = 1;

    /**
     * Counter constructor
     * @param null|string $name
     * @param null|int $step
     * @param int $initialValue
     * @throws \Exception
     */
    public function __construct(?string $name = null, ?int $step = null, int $initialValue = 0)
    {
        parent::__construct();
        $this->name = $this->defaultName($name);
        $this->setInitialValue($initialValue);
        $this->setStep($step);
    }

    /**
     * @param int $initialValue
     * @return AbstractCounter
     */
    public function setInitialValue(int $initialValue): AbstractCounter
    {
        if (false === $this->isStarted()) {
            $this->updateValues($initialValue);
        } else {
            throw new \RuntimeException('You can\'t set counter initial value, it has been bumped already.');
        }
        return $this;
    }

    /**
     * @param int $initialValue
     */
    protected function updateValues(int $initialValue): void
    {
        $this->value = $this->initialValue = $initialValue;
    }

    /**
     * @param null|int $step
     * @return AbstractCounter
     */
    public function setStep(?int $step = null): AbstractCounter
    {
        $step = $this->assertStep($step);
        if (false === $this->isStarted()) {
            $this->step = $step;
        } else {
            throw new \RuntimeException('You can\'t set counter step value, it has been bumped already.');
        }
        return $this;
    }

    /**
     * @param null|int $step
     * @return int
     */
    protected function assertStep(?int $step = null): int
    {
        $step = $step ?? self::DEFAULT_STEP;
        if ($step === 0) {
            throw new \RuntimeException('Counter step should be non-zero integer.');
        }
        return $step;
    }

    /**
     * @param int $times
     * @return int
     */
    public function bump(int $times = 1): int
    {
        $times = $this->assertTimes($times);
        if ($this->isNotStarted()) {
            $this->start();
        }
        $this->value += $times * $this->step;
        $this->bumped++;
        return
            $this->value;
    }

    protected function assertTimes(int $times): int
    {
        if ($times < 1) {
            throw new \RuntimeException(
                'Parameter 0 for bump() or bumpBack() should be positive non-zero integer.'
            );
        }
        return $times;
    }

    public function report(): AbstractCounterReport
    {
        return Container::getInstance()->make($this->reportClass, ['counter' => $this]);
    }
}
