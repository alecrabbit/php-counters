<?php declare(strict_types=1);

namespace AlecRabbit\Counters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Formatters\Core\AbstractFormatter;
use AlecRabbit\Formatters\DefaultFormatter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;
use AlecRabbit\Reports\DefaultReport;
use Illuminate\Container\Container;

abstract class AbstractCounter extends AbstractReportable
{
    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        $this->reportClass = $reportClass ?? DefaultReport::class;
        $this->formatterClass = $formatterClass ?? DefaultFormatter::class;
        $this->setDependencies($this->reportClass, FormatterInterface::class, $this->formatterClass);
    }

    /**
     * @param string $when
     * @param string $needs
     * @param AbstractFormatter|string|\Closure $give
     */
    protected function setDependencies(string $when, string $needs, $give): void
    {
        if ($give instanceof AbstractFormatter) {
            $give = static function () use ($give): AbstractFormatter {
                return $give;
            };
        }
        Container::getInstance()
            ->when($when)
            ->needs($needs)
            ->give($give);
    }

    public function report(): AbstractCounterReport
    {
        return Container::getInstance()->make($this->reportClass, ['counter' => $this]);
    }

    /**
     * @param AbstractFormatter|string|\Closure $formatter
     */
    public function setFormatter($formatter): void
    {
        $this->setDependencies($this->reportClass, FormatterInterface::class, $formatter);
    }

    protected function setDefaultBindings(string $reportClass = null, string $formatterClass = null): void
    {
        $this->setDependencies(
            $reportClass ?? DefaultReport::class,
            FormatterInterface::class,
            $formatterClass ?? DefaultFormatter::class
        );
    }
}
