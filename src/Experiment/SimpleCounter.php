<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

use Illuminate\Container\Container;

class SimpleCounter extends AbstractCounter
{
    public function report(): AbstractReport
    {
        return Container::getInstance()->make(SimpleCounterReport::class);
    }
}
