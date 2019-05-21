<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

abstract class AbstractReportable
{
    /** @var string */
    protected $formatterClass;
    /** @var string */
    protected $reportClass;
}
