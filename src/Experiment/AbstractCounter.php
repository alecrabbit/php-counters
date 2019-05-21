<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

use Illuminate\Container\Container;

class AbstractCounter
{
    protected $defaultFormatterClass;
    protected $defaultReportClass;

    public function __construct(string $formatterClass = null, string $reportClass = null)
    {
        $this->defaultFormatterClass = $formatterClass ?? DefaultFormatter::class;
        $this->defaultReportClass = $reportClass ?? DefaultReport::class;
    }

    /**
     * @param string|FormatterInterface $formatter
     */
    public function setFormatter($formatter): void
    {
        $this->setDependencies($this->defaultReportClass, $this->defaultFormatterClass, $formatter);
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
        dump($when, $needs, $give);
        Container::getInstance()
            ->when($when)
            ->needs($needs)
            ->give($give);
    }
}