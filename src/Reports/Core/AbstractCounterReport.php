<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Counters\Core\AbstractCounter;
use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractCounterReport extends AbstractReport
{
    /** @var AbstractCounter */
    protected $reportable;

    /**
     * AbstractCounterReport constructor.
     * @param FormatterInterface $formatter
     * @param AbstractCounter $reportable
     */
    public function __construct(FormatterInterface $formatter, AbstractCounter $reportable)
    {
        $this->reportable = $reportable;
        parent::__construct($formatter, $reportable);
    }

    /**
     * @return mixed
     */
    public function getReportable()
    {
        return $this->reportable;
    }
}
