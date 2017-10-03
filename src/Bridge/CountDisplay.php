<?php

namespace GoF\Bridge;

class CountDisplay extends Display
{
    /**
     * CountDisplayImpl constructor.
     * @param DisplayImpl $impl
     */
    public function __construct(DisplayImpl $impl)
    {
        parent::__construct($impl);
    }

    /**
     * @param int $times
     */
    public function multiDisplay($times)
    {
        $this->open();
        for ($i = 0; $i < $times; $i++) {
            $this->printer();
        }
        $this->close();
    }
}
