<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Formatters\Core\Formattable;

abstract class AbstractReport extends Formattable
{
    /** @var null|FormatterInterface */
    protected $formatter;

    public function __construct(FormatterInterface $formatter = null, AbstractReportable $reportable = null)
    {
        $this->formatter = $formatter;
        $this->data = $this->extractDataFrom($reportable);
    }

    /**
     * @param AbstractReportable $reportable
     * @return array
     */
    protected function extractDataFrom(AbstractReportable $reportable = null): array
    {
        return [];
    }

    public function __toString()
    {
        if ($this->formatter instanceof FormatterInterface) {
            return $this->formatter->format($this);
        }
        return 'ERROR: no formatter';
    }

    /**
     * @return null|FormatterInterface
     */
    public function getFormatter(): ?FormatterInterface
    {
        return $this->formatter;
    }
}
