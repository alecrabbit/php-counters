<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Experiment\Unit;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Counters\ExtendedCounter;
use AlecRabbit\Counters\SimpleCounter;
use AlecRabbit\Formatters\ExtendedCounterReportFormatter;
use AlecRabbit\Formatters\SimpleCounterReportFormatter;
use AlecRabbit\Reports\Core\AbstractCounterReport;
use AlecRabbit\Reports\ExtendedCounterReport;
use AlecRabbit\Reports\SimpleCounterReport;
use AlecRabbit\Tests\Helper;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use PHPUnit\Framework\TestCase;

class BindingTest extends TestCase
{
    /**
     * @test
     * @dataProvider instancesDataProvider
     * @param array $values
     * @throws BindingResolutionException
     */
    public function instance(array $values): void
    {
        [
            $resetContainer,
            $counterClass,
            $reportClass,
            $formatterClass,
            $expectedResult
        ] = $values;
        if ($resetContainer) {
            Container::setInstance();
        }
        $counter = new $counterClass();
        /** @var AbstractCounter $counter */
        $counter->setFormatter($formatterClass);
        $counterReport = $counter->report();
        $this->assertInstanceOf($counterClass, $counter);
        /** @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf($reportClass, $counterReport);
        /** @var AbstractCounterReport $counterReport */
        $this->assertInstanceOf($counterClass, $counterReport->getReportable());
        $str = (string)$counterReport;
        $this->assertSame($expectedResult, Helper::stripEscape($str));
    }

    public function instancesDataProvider(): array
    {
        return [
            [
                [
                    false,
                    SimpleCounter::class,
                    SimpleCounterReport::class,
                    SimpleCounterReportFormatter::class,
                    'Counter: 0',
                ],
            ],
            [
                [
                    false,
                    ExtendedCounter::class,
                    ExtendedCounterReport::class,
                    ExtendedCounterReportFormatter::class,
                    'Counter: 0',
                ],
            ],
        ];
    }
}
