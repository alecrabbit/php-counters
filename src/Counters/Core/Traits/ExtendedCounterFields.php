<?php declare(strict_types=1);

namespace AlecRabbit\Counters\Core\Traits;

trait ExtendedCounterFields
{
    /** @var int */
    protected $max = 0;

    /** @var int */
    protected $min = 0;

    /** @var int */
    protected $path = 0;

    /** @var int */
    protected $length = 0;

    /** @var int */
    protected $diff = 0;

    /** @var int */
    protected $bumpedBack = 0;

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getPath(): int
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getDiff(): int
    {
        return $this->diff;
    }

    /**
     * @return int
     */
    public function getBumpedBack(): int
    {
        return $this->bumpedBack;
    }
}
