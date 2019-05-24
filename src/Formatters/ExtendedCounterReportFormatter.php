<?php declare(strict_types=1);

namespace AlecRabbit\Formatters;

use AlecRabbit\Formatters\Contracts\CounterStrings;
use AlecRabbit\Reports\Core\Formattable;
use AlecRabbit\Reports\ExtendedCounterReport;
use const AlecRabbit\Traits\Constants\DEFAULT_NAME;

class ExtendedCounterReportFormatter extends SimpleCounterReportFormatter
{
    public function format(Formattable $formattable): string
    {
        if ($formattable instanceof ExtendedCounterReport) {
            $data = $formattable->getData();
            if (DEFAULT_NAME === $data['name']) {
                return $this->simple($data);
            }
            return $this->full($data);
        }
        return
            $this->errorMessage($formattable, ExtendedCounterReport::class);
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
                $data['name'],
                (string)$data['value'],
                (string)$data['step'],
                $this->computeBumped($data),
                (string)$data['path'],
                (string)$data['length'],
                (string)$data['max'],
                (string)$data['min'],
                (string)$data['diff']
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
                CounterStrings::FORWARD . '%s ' . CounterStrings::BACKWARD . '%s ',
                $data['bumped'],
                $data['bumpedBack']
            );
    }
}
