<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Counters;

use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Formatters\Contracts\CounterStrings;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\SimpleCounterReport;
use AlecRabbit\Tests\WrongFormattable;
use PHPUnit\Framework\TestCase;
use const AlecRabbit\Traits\Constants\DEFAULT_NAME;

class SimpleCounterReportFormatterTest extends TestCase
{
    /** @test */
    public function correctReport(): void
    {
        $formatter = new SimpleCounterReportFormatter();
        $counter = new SimpleCounter();
        $counterReport = new SimpleCounterReport($formatter, $counter);
        $str = $formatter->format($counterReport);
        $this->assertStringContainsString(CounterStrings::COUNTER, $str);
    }

    /** @test */
    public function wrongReport(): void
    {
        $formatter = new SimpleCounterReportFormatter();
        $wrongFormattable = new WrongFormattable();
        $str = $formatter->format($wrongFormattable);
        $this->assertSame(
            '[AlecRabbit\Formatters\SimpleCounterReportFormatter]' .
            ' ERROR: AlecRabbit\Reports\SimpleCounterReport expected, AlecRabbit\Tests\WrongFormattable given.',
            $str
        );
    }

    /**
     * @test
     * @throws \Exception
     */
    public function counterReportDefault(): void
    {
        $c = new SimpleCounter();
        /** @var SimpleCounterReport $report */
        $report = $c->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $report);
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
        $c = new SimpleCounter($name);
        /** @var SimpleCounterReport $report */
        $report = $c->report();
        $this->assertInstanceOf(SimpleCounterReport::class, $report);
        $str = (string)$report;
        $this->assertStringContainsString($name, $str);
        $this->assertStringContainsString(CounterStrings::COUNTER, $str);
        $this->assertStringContainsString(CounterStrings::VALUE, $str);
        $this->assertStringContainsString(CounterStrings::STEP, $str);
        $this->assertStringNotContainsString(CounterStrings::DIFF, $str);
        $this->assertStringNotContainsString(CounterStrings::PATH, $str);
        $this->assertStringNotContainsString(CounterStrings::LENGTH, $str);
        $this->assertStringNotContainsString(CounterStrings::MIN, $str);
        $this->assertStringNotContainsString(CounterStrings::MAX, $str);
        $this->assertStringContainsString(CounterStrings::BUMPED, $str);
        $this->assertStringContainsString(CounterStrings::FORWARD, $str);
        $this->assertStringNotContainsString(CounterStrings::BACKWARD, $str);

        $data = $report->getData();
        $this->assertEquals($name, $data['name']);
        $this->assertEquals(0, $data['value']);
        $this->assertEquals(1, $data['step']);
        $this->assertEquals(0, $data['initialValue']);
        $this->assertEquals(0, $data['bumped']);
    }
}
