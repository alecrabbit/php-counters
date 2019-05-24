<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\ConsoleColour\Themes;
use AlecRabbit\Formatters\Contracts\CounterStrings;

class ColoredExtendedCounterReportFormatter extends ExtendedCounterReportFormatter
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

    protected function full(array $data): string
    {
        return
            sprintf(
                CounterStrings::COUNTER . '[%s]: ' .
                CounterStrings::VALUE . ': %s, ' .
                CounterStrings::STEP . ': %s, ' .
                CounterStrings::BUMPED . ': %s, ' .
                CounterStrings::PATH . ': %s, ' .
                CounterStrings::LENGTH . ': %s, ' .
                CounterStrings::MAX . ': %s, ' .
                CounterStrings::MIN . ': %s, ' .
                CounterStrings::DIFF . ': %s',
                $this->color->yellow($data['name']),
                $this->color->lightCyan((string)$data['value']),
                (string)$data['step'],
                $this->computeBumped($data),
                (string)$data['path'],
                (string)$data['length'],
                (string)$data['max'],
                (string)$data['min'],
                (string)$data['diff']
            );
    }

    protected function computeBumped(array $data): string
    {
        return
            sprintf(
                $this->color->green(CounterStrings::FORWARD) . '%s ' .
                $this->color->red(CounterStrings::BACKWARD) . '%s ',
                $data['bumped'],
                $data['bumpedBack']
            );
    }
}
