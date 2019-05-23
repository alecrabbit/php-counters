<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;

abstract class AbstractReport extends Formattable
{
    /** @var array */
    protected $data;
    /** @var null|AbstractReportable */
    protected $reportable;

    public function __construct(FormatterInterface $formatter = null, AbstractReportable $reportable = null)
    {
        parent::__construct($formatter);
        $this->reportable = $reportable;
        $this->extractDataFrom($reportable);
    }

    /**
     * @param AbstractReportable $reportable
     */
    protected function extractDataFrom(AbstractReportable $reportable = null): void
    {
        $this->data = [];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getReportable()
    {
        return $this->reportable;
    }
}
