<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\ConsoleColour\Themes;
use AlecRabbit\Counters\Contracts\CounterStrings;

class ColoredSimpleCounterReportFormatter extends SimpleCounterReportFormatter
{
    /** @var Themes */
    protected $color;

    public function __construct(?int $options = null)
    {
        parent::__construct($options);
        $this->color = new Themes();
    }

    /**
     * @param array $data
     * @return string
     */
    protected function simple(array $data): string
    {
        return
            sprintf(
                CounterStrings::COUNTER . ': %s',
                $this->color->lightCyan((string)$data['value'])
            );
    }

    /**
     * @param array $data
     * @return string
     */
    protected function full(array $data): string
    {
        return
            sprintf(
                CounterStrings::COUNTER . '[%s]: ' .
                CounterStrings::VALUE . ': %s, ' .
                CounterStrings::STEP . ': %s, ' .
                CounterStrings::BUMPED . ': %s',
                $this->color->yellow($data['name']),
                (string)$data['value'],
                (string)$data['step'],
                $this->computeBumped($data)
            );
    }
}
