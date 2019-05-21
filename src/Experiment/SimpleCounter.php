<?php declare(strict_types=1);

namespace AlecRabbit\Experiment;

use Illuminate\Container\Container;

class SimpleCounter
{
    public function report(): AbstractReport
    {
        return Container::getInstance()->make(SimpleCounterReport::class);
    }
}
