<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Experiment\Unit;

use AlecRabbit\Experiment\ExtendedCounter;
use AlecRabbit\Experiment\ExtendedCounterReport;
use AlecRabbit\Experiment\ExtendedCounterReportFormatter;
use AlecRabbit\Experiment\HtmlExtendedCounterReportFormatter;
use AlecRabbit\Experiment\SimpleCounter;
use AlecRabbit\Experiment\SimpleCounterReport;
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

        $this->assertSame('AlecRabbit\Experiment\SimpleCounterReportFormatter', (string)$counterReport);
        $this->assertSame(
            'AlecRabbit\Experiment\ExtendedCounterReportFormatter',
            (string)$extendedCounterReport
        );
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

        $this->assertSame('AlecRabbit\Experiment\SimpleCounterReportFormatter', (string)$counterReport);
        $this->assertSame(
            '<b>AlecRabbit\Experiment\HtmlExtendedCounterReportFormatter</b>',
            (string)$extendedCounterReport
        );
    }
}
