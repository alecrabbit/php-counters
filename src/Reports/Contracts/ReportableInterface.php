<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Contracts;

interface ReportableInterface
{
    /**
     * @return ReportInterface
     */
    public function report(): ReportInterface;
}
