<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

use Illuminate\Container\Container;

class AbstractCounter extends AbstractReportable
{
    protected $defaultFormatterClass;
    protected $defaultReportClass;

    public function __construct(string $reportClass = null, string $formatterClass = null)
    {
        $this->defaultReportClass = $reportClass ?? DefaultReport::class;
        $this->defaultFormatterClass = $formatterClass ?? DefaultFormatter::class;
        $this->setDependencies($this->defaultReportClass, FormatterInterface::class , $this->defaultFormatterClass);
    }

    public function report(): AbstractReport
    {
        return Container::getInstance()->make($this->defaultReportClass, ['counter' => $this]);
    }

    /**
     * @param string|FormatterInterface $formatter
     */
    public function setFormatter($formatter): void
    {
        $this->setDependencies($this->defaultReportClass, FormatterInterface::class, $formatter);
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
}