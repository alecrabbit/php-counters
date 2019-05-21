<?php declare(strict_types=1);

namespace AlecRabbit\Counters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Formatters\DefaultFormatter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\Core\AbstractReportable;
use AlecRabbit\Reports\DefaultReport;
use Illuminate\Container\Container;

abstract class AbstractCounter extends AbstractReportable
{
    protected $defaultFormatterClass;
    protected $defaultReportClass;

    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        $this->defaultReportClass = $reportClass ?? DefaultReport::class;
        $this->defaultFormatterClass = $formatterClass ?? DefaultFormatter::class;
        $this->setDependencies($this->defaultReportClass, FormatterInterface::class, $this->defaultFormatterClass);
    }

    /**
     * @param string $when
     * @param string $needs
     * @param object|string $give
     */
    protected function setDependencies(string $when, string $needs, $give): void
    {
        if (is_object($give)) {
            $give = static function () use ($give) {
                return $give;
            };
        }
//        dump($when, $needs, $give);
        Container::getInstance()
            ->when($when)
            ->needs($needs)
            ->give($give);
    }

    public function report(): AbstractCounterReport
    {
        return Container::getInstance()->make($this->defaultReportClass, ['counter' => $this]);
    }

    /**
     * @param string|\AlecRabbit\Formatters\Contracts\FormatterInterface $formatter
     */
    public function setFormatter($formatter): void
    {
        $this->setDependencies($this->defaultReportClass, FormatterInterface::class, $formatter);
    }

    protected function setDefaultDependenciesBindings(string $reportClass = null, string $formatterClass = null): void
    {
        $this->setDependencies(
            $reportClass ?? DefaultReport::class,
            FormatterInterface::class,
            $formatterClass ?? DefaultFormatter::class
        );
    }
}
