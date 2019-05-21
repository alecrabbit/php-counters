<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Experiment\Unit;

use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Formatters\HtmlExtendedCounterReportFormatter;
use AlecRabbit\Formatters\HtmlSimpleCounterReportFormatter;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;
use AlecRabbit\Reports\SimpleCounterReport;
use Illuminate\Container\Container;
use PHPUnit\Framework\TestCase;

class BindingTest extends TestCase
{
    /** @test */
    public function first(): void
    {
        $counter = new SimpleCounter();
        $extendedCounter = new ExtendedCounter();
        $this->assertInstanceOf(SimpleCounter::class, $counter);
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounter);
        $counterReport = $counter->report();
        $extendedCounterReport = $extendedCounter->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $counterReport);
        $this->assertInstanceOf(ExtendedCounterReport::class, $extendedCounterReport);

        $this->assertInstanceOf(ExtendedCounterReportFormatter::class, $extendedCounterReport->getFormatter());
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounterReport->getCounter());

        $this->assertSame(SimpleCounterReportFormatter::class, (string)$counterReport);
        $this->assertSame(ExtendedCounterReportFormatter::class, (string)$extendedCounterReport);
    }

    /** @test */
    public function second(): void
    {
        $container = Container::getInstance();
        $container
            ->when(ExtendedCounterReport::class)
            ->needs(ExtendedCounterReportFormatter::class)
            ->give(HtmlExtendedCounterReportFormatter::class);

        $counter = new SimpleCounter();
        $extendedCounter = new ExtendedCounter();
        $this->assertInstanceOf(SimpleCounter::class, $counter);
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounter);
        $counterReport = $counter->report();
        $extendedCounterReport = $extendedCounter->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $counterReport);
        $this->assertInstanceOf(ExtendedCounterReport::class, $extendedCounterReport);

        $this->assertInstanceOf(HtmlExtendedCounterReportFormatter::class, $extendedCounterReport->getFormatter());
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounterReport->getCounter());

        $this->assertSame(SimpleCounterReportFormatter::class, (string)$counterReport);
        $this->assertSame('<b>' . HtmlExtendedCounterReportFormatter::class . '</b>', (string)$extendedCounterReport);
    }

    /** @test */
    public function third(): void
    {
        Container::setInstance();
        $counter = new SimpleCounter();
        $extendedCounter = new ExtendedCounter();
        $extendedCounter->setFormatter(HtmlExtendedCounterReportFormatter::class);

        $this->assertInstanceOf(SimpleCounter::class, $counter);
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounter);
        $counterReport = $counter->report();
        $extendedCounterReport = $extendedCounter->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $counterReport);
        $this->assertInstanceOf(ExtendedCounterReport::class, $extendedCounterReport);

        $this->assertInstanceOf(HtmlExtendedCounterReportFormatter::class, $extendedCounterReport->getFormatter());
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounterReport->getCounter());

        $this->assertSame(SimpleCounterReportFormatter::class, (string)$counterReport);
        $this->assertSame('<b>' . HtmlExtendedCounterReportFormatter::class . '</b>', (string)$extendedCounterReport);
    }

    /** @test */
    public function thirdAlpha(): void
    {
        Container::setInstance();
        $counter = new SimpleCounter();
        $extendedCounter = new ExtendedCounter(null, HtmlExtendedCounterReportFormatter::class);

        $this->assertInstanceOf(SimpleCounter::class, $counter);
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounter);
        $counterReport = $counter->report();
        $extendedCounterReport = $extendedCounter->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $counterReport);
        $this->assertInstanceOf(ExtendedCounterReport::class, $extendedCounterReport);

        $this->assertInstanceOf(HtmlExtendedCounterReportFormatter::class, $extendedCounterReport->getFormatter());
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounterReport->getCounter());

        $this->assertSame(SimpleCounterReportFormatter::class, (string)$counterReport);
        $this->assertSame('<b>' . HtmlExtendedCounterReportFormatter::class . '</b>', (string)$extendedCounterReport);
    }

    /** @test */
    public function fours(): void
    {
        Container::setInstance();
        $counter = new SimpleCounter();
        $extendedCounter = new ExtendedCounter();
        $counter->setFormatter(HtmlSimpleCounterReportFormatter::class);
        $extendedCounter->setFormatter(HtmlExtendedCounterReportFormatter::class);

        $this->assertInstanceOf(SimpleCounter::class, $counter);
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounter);
        $counterReport = $counter->report();
        $extendedCounterReport = $extendedCounter->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $counterReport);
        $this->assertInstanceOf(ExtendedCounterReport::class, $extendedCounterReport);

        $this->assertInstanceOf(HtmlExtendedCounterReportFormatter::class, $extendedCounterReport->getFormatter());
        $this->assertInstanceOf(ExtendedCounter::class, $extendedCounterReport->getCounter());
        $this->assertInstanceOf(SimpleCounter::class, $counterReport->getCounter());

        $this->assertSame('<b>' . HtmlSimpleCounterReportFormatter::class . '</b>', (string)$counterReport);
        $this->assertSame('<b>' . HtmlExtendedCounterReportFormatter::class . '</b>', (string)$extendedCounterReport);
    }
}
