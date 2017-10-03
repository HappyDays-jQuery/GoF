<?php

namespace GoF\ChainOfResponsibility;

class Trouble
{
    /**
     * @var int
     */
    private $number;

    /**
     * Trouble constructor.
     * @param int $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[Trouble {$this->number}]";
    }
}
