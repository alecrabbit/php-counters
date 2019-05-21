<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Experiment\Unit;

use AlecRabbit\Experiment\ExtendedCounter;
use AlecRabbit\Experiment\ExtendedCounterReport;
use AlecRabbit\Experiment\ExtendedCounterReportFormatter;
use AlecRabbit\Experiment\HtmlExtendedCounterReportFormatter;
use AlecRabbit\Experiment\HtmlSimpleCounterReportFormatter;
use AlecRabbit\Experiment\SimpleCounter;
use AlecRabbit\Experiment\SimpleCounterReport;
use AlecRabbit\Experiment\SimpleCounterReportFormatter;
use Illuminate\Container\Container;
use PHPUnit\Framework\TestCase;

class DefaultTest extends TestCase
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
