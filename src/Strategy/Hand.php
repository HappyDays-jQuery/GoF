<?php

namespace GoF\Strategy;

class Hand
{
    /**
     * @var int
     */
    private $handVal;
    /**
     * @var string
     */
    private $name;

    /**
     * Hand constructor.
     * @param int    $handVal
     * @param string $name
     */
    public function __construct($handVal, $name)
    {
        $this->name = $name;
        $this->handVal = $handVal;
    }

    /**
     * @return int
     */
    public function getHandVal()
    {
        return $this->handVal;
    }

    /**
     * @param Hand $h
     * @return bool
     */
    public function isStrongerThan(Hand $h)
    {
        return $this->fight($h) == 1;
    }

    /**
     * @param Hand $h
     * @return bool
     */
    public function isWeakerThan(Hand $h)
    {
        return $this->fight($h) == -1;
    }

    /**
     * @param Hand $h
     * @return int
     */
    private function fight(Hand $h)
    {
        if ($this->getHandVal() == $h->getHandVal()) {
            return 0;
        }

        return ($this->handVal + 1) % 3 == $h->getHandVal() ? 1 : -1;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
