<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\Formatters\Contracts\CounterStrings;
use AlecRabbit\Formatters\Core\AbstractFormatter;
use AlecRabbit\Reports\Core\Formattable;
use AlecRabbit\Reports\SimpleCounterReport;
use const AlecRabbit\Traits\Constants\DEFAULT_NAME;

class SimpleCounterReportFormatter extends AbstractFormatter
{
    public function format(Formattable $formattable): string
    {
        if ($formattable instanceof SimpleCounterReport) {
            $data = $formattable->getData();
            if (DEFAULT_NAME === $data['name']) {
                return $this->simple($data);
            }
            return $this->full($data);
        }
        return
            $this->errorMessage($formattable, SimpleCounterReport::class);
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
                (string)$data['value']
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
                $data['name'],
                (string)$data['value'],
                (string)$data['step'],
                $this->computeBumped($data)
            );
    }

    /**
     * @param array $data
     * @return string
     */
    protected function computeBumped(array $data): string
    {
        return
            sprintf(
                CounterStrings::FORWARD . '%s ',
                $data['bumped']
            );
    }
}
