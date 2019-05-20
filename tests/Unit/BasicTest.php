<?php

namespace Tests\AlecRabbit\Experiment;

use AlecRabbit\Experiment\BasicClass;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /** @test */
    public function dummy():void
    {
        $this->assertTrue(BasicClass::get());
    }
}
