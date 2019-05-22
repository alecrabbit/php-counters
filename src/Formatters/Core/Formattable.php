<?php declare(strict_types=1);

namespace AlecRabbit\Formatters\Core;

abstract class Formattable
{
    /** @var array */
    protected $data;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

}
