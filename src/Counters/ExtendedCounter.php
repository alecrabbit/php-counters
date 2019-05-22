<?php declare(strict_types=1);

namespace AlecRabbit\Counters;

use AlecRabbit\Counters\Core\Traits\ExtendedCounterFields;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;

class ExtendedCounter extends SimpleCounter
{
    use ExtendedCounterFields;

    /** {@inheritDoc} */
    public function __construct(?string $name = null, ?int $step = null, int $initialValue = 0)
    {
        parent::__construct($name, $step, $initialValue);
        $this->setBindings(
            ExtendedCounterReport::class,
            ExtendedCounterReportFormatter::class
        );
        $this->updateExtendedValues();
    }

    protected function updateExtendedValues(): void
    {
        $this->updateMaxAndMin();
        $this->updateDiff();
    }

    protected function updateMaxAndMin(): void
    {
        if ($this->value > $this->max) {
            $this->max = $this->value;
        }
        if ($this->value < $this->min) {
            $this->min = $this->value;
        }
    }

    protected function updateDiff(): void
    {
        $this->diff = $this->value - $this->initialValue;
    }

    /**
     * @param int $times
     * @return int
     */
    public function bumpBack(int $times = 1): int
    {
        return
            $this->bump($times, false);
    }

    /**
     * @param int $times
     * @param bool $forward
     * @return int
     */
    public function bump(int $times = 1, bool $forward = true): int
    {
        $times = $this->assertTimes($times);
        if ($this->isNotStarted()) {
            $this->start();
        }
        $this->path += $times * $this->step;
        $this->length += $times * $this->step;
        if ($forward) {
            $this->value += $times * $this->step;
            $this->bumped++;
        } else {
            $this->value -= $times * $this->step;
            $this->bumpedBack++;
        }
        $this->updateExtendedValues();
        return
            $this->value;
    }

    /**
     * {@inheritdoc}
     *
     */
    protected function updateValues(int $initialValue): void
    {
        $this->value = $this->initialValue = $this->length = $this->max = $this->min = $initialValue;
    }

}
