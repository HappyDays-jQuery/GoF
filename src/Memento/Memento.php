<?php

namespace GoF\Memento;

use GoF\Collection\ArrayList;

class Memento
{
    /**
     * @var int
     */
    private $money;
    /**
     * @var ArrayList
     */
    private $fruits;

    /**
     * Memento constructor.
     * @param int $money
     */
    public function __construct($money)
    {
        $this->money = $money;
        $this->fruits = new ArrayList();
    }

    /**
     * @return int
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param string $fruit
     */
    public function addFruit($fruit)
    {
        $this->fruits->add($fruit);
    }

    public function getFruits()
    {
        return clone $this->fruits;
    }
}
