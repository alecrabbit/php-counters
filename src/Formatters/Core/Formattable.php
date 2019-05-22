<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Core;

use AlecRabbit\Formatters\Contracts\FormatterInterface;
use AlecRabbit\Reports\Core\AbstractReportable;

abstract class Formattable
{
    /** @var array */
    protected $data;
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
        return get_class($this) . ' ERROR: no formatter';
    }

    /**
     * @return null|FormatterInterface
     */
    public function getFormatter(): ?FormatterInterface
    {
        return $this->formatter;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
