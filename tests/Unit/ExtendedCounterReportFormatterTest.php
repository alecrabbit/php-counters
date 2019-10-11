<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Counters;

use AlecRabbit\Auxiliary\WrongFormattable;
use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Formatters\Contracts\CounterStrings;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Reports\ExtendedCounterReport;
use AlecRabbit\Reports\SimpleCounterReport;
use PHPUnit\Framework\TestCase;
use const AlecRabbit\Traits\Constants\DEFAULT_NAME;

class ExtendedCounterReportFormatterTest extends TestCase
{
    /** @test */
    public function correctReport(): void
    {
        $formatter = new ExtendedCounterReportFormatter();
        $counter = new ExtendedCounter();
        $counterReport = new ExtendedCounterReport($formatter, $counter);
        $str = $formatter->format($counterReport);
        $this->assertStringContainsString(CounterStrings::COUNTER, $str);
        $this->assertEquals(CounterStrings::COUNTER . ': 0', $str);
    }

    /** @test */
    public function wrongReport(): void
    {
        $formatter = new ExtendedCounterReportFormatter();
        $wrongFormattable = new WrongFormattable();
        $str = $formatter->format($wrongFormattable);
        $this->assertSame(
            '[AlecRabbit\Formatters\ExtendedCounterReportFormatter]' .
            ' ERROR: AlecRabbit\Reports\ExtendedCounterReport expected, AlecRabbit\Auxiliary\WrongFormattable given.',
            $str
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function counterReportDefault(): void
    {
        $c = new ExtendedCounter();
        /** @var SimpleCounterReport $report */
        $report = $c->report();
        $this->assertInstanceOf(ExtendedCounterReport::class, $report);
        $str = (string)$report;
        $this->assertStringNotContainsString(DEFAULT_NAME, $str);
        $this->assertStringContainsString(CounterStrings::COUNTER, $str);
        $this->assertStringNotContainsString(CounterStrings::VALUE, $str);
        $this->assertStringNotContainsString(CounterStrings::STEP, $str);
        $this->assertStringNotContainsString(CounterStrings::DIFF, $str);
        $this->assertStringNotContainsString(CounterStrings::PATH, $str);
        $this->assertStringNotContainsString(CounterStrings::LENGTH, $str);
        $this->assertStringNotContainsString(CounterStrings::MIN, $str);
        $this->assertStringNotContainsString(CounterStrings::MAX, $str);
        $this->assertStringNotContainsString(CounterStrings::BUMPED, $str);
        $this->assertStringNotContainsString(CounterStrings::FORWARD, $str);
        $this->assertStringNotContainsString(CounterStrings::BACKWARD, $str);

        $data = $report->getData();
        $this->assertEquals(DEFAULT_NAME, $data['name']);
        $this->assertEquals(0, $data['value']);
        $this->assertEquals(1, $data['step']);
        $this->assertEquals(0, $data['initialValue']);
        $this->assertEquals(0, $data['bumped']);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function counterReportDefaultWithName(): void
    {
        $name = 'name';
        $c = new ExtendedCounter($name);
        /** @var SimpleCounterReport $report */
        $report = $c->report();
        $this->assertInstanceOf(ExtendedCounterReport::class, $report);
        $str = (string)$report;
        $this->assertStringContainsString($name, $str);
        $this->assertStringContainsString(CounterStrings::COUNTER, $str);
        $this->assertStringContainsString(CounterStrings::VALUE, $str);
        $this->assertStringContainsString(CounterStrings::STEP, $str);
        $this->assertStringContainsString(CounterStrings::DIFF, $str);
        $this->assertStringContainsString(CounterStrings::PATH, $str);
        $this->assertStringContainsString(CounterStrings::LENGTH, $str);
        $this->assertStringContainsString(CounterStrings::MIN, $str);
        $this->assertStringContainsString(CounterStrings::MAX, $str);
        $this->assertStringContainsString(CounterStrings::BUMPED, $str);
        $this->assertStringContainsString(CounterStrings::FORWARD, $str);
        $this->assertStringContainsString(CounterStrings::BACKWARD, $str);

        $data = $report->getData();
        $this->assertEquals($name, $data['name']);
        $this->assertEquals(0, $data['value']);
        $this->assertEquals(1, $data['step']);
        $this->assertEquals(0, $data['initialValue']);
        $this->assertEquals(0, $data['bumped']);
    }
}
