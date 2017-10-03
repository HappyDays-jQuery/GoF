<?php

namespace GoF\Strategy;

class Player
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Strategy
     */
    private $strategy;
    /**
     * @var int
     */
    private $winCount = 0;
    /**
     * @var int
     */
    private $loseCount = 0;
    /**
     * @var int
     */
    private $gameCount = 0;

    /**
     * Player constructor.
     * @param string   $name
     * @param Strategy $strategy
     */
    public function __construct($name, Strategy $strategy)
    {
        $this->name = $name;
        $this->strategy = $strategy;
    }

    /**
     * @return Hand
     */
    public function nextHand()
    {
        return $this->strategy->nextHand();
    }

    /**
     * @return void
     */
    public function win()
    {
        $this->strategy->study(true);
        $this->winCount++;
        $this->gameCount++;
    }

    /**
     * @return void
     */
    public function lose()
    {
        $this->strategy->study(false);
        $this->loseCount++;
        $this->gameCount++;
    }

    /**
     * @return void
     */
    public function even()
    {
        $this->gameCount++;
    }

    public function __toString()
    {
        return "{$this->name} : {$this->gameCount} games,  {$this->winCount} win, {$this->loseCount} lose";
    }
}
