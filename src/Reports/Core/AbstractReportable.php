<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Formatters\Core\AbstractFormatter;
use AlecRabbit\Formatters\DefaultFormatter;
use AlecRabbit\Reports\DefaultReport;
use Illuminate\Container\Container;

abstract class AbstractReportable
{
    /** @var string */
    protected $formatterClass;
    /** @var string */
    protected $reportClass;

    public function __construct()
    {
        $this->setDefaultBindings();
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
        $this->reportClass = $reportClass ?? DefaultReport::class;
        $this->formatterClass = $formatterClass ?? DefaultFormatter::class;
        $this->setDependencies(
            $this->reportClass,
            FormatterInterface::class,
            $this->formatterClass
        );
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


}
