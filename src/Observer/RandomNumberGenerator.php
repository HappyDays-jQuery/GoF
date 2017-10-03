<?php

namespace GoF\Observer;

class RandomNumberGenerator extends NumberGenerator
{
    /**
     * @var int
     */
    private $number;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return void
     */
    public function execute()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->number = mt_rand(0, 50);
            $this->notify();
        }
    }
}
