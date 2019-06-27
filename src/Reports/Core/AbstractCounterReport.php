<?php declare(strict_types=1);

namespace AlecRabbit\Reports\Core;

use AlecRabbit\Counters\Core\Traits\SimpleCounterFields;

abstract class AbstractCounterReport extends AbstractReport
{
    use SimpleCounterFields;
}
