<?php

namespace GoF\Strategy;

class WinningStrategy extends Strategy
{
    /**
     * @var bool
     */
    private $won;
    /**
     * @var Hand
     */
    private $prevHand;

    /**
     * @return Hand
     */
    public function nextHand()
    {
        if (!$this->won) {
            $this->prevHand = $this->hands[mt_rand(0, 2)];
        }

        return $this->prevHand;
    }

    public function study($win)
    {
        $this->won = $win;
    }
}
