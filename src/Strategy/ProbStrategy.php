<?php

namespace GoF\Strategy;

class ProbStrategy extends Strategy
{
    /**
     * @var int
     */
    private $prevHandValue = 0;
    /**
     * @var int
     */
    private $currentHandValue = 0;
    /**
     * @var array
     */
    private $history = [
        [1, 1, 1],
        [1, 1, 1],
        [1, 1, 1]
    ];

    /**
     * @return Hand
     */
    public function nextHand()
    {
        $bet = mt_rand(0, $this->getSum($this->currentHandValue));
        $handVal = 2;
        if ($bet < $this->history[$this->currentHandValue][0]) {
            $handVal = 0;
        } elseif ($bet < ($this->history[$this->currentHandValue][0] + $this->history[$this->currentHandValue][1])) {
            $handVal = 1;
        }

        $this->prevHandValue = $this->currentHandValue;
        $this->currentHandValue = $handVal;

        return $this->hands[$handVal];
    }

    public function study($win)
    {
        if ($win) {
            $this->history[$this->prevHandValue][$this->currentHandValue]++;
            return;
        }

        $this->history[$this->prevHandValue][($this->currentHandValue + 1) % 3]++;
        $this->history[$this->prevHandValue][($this->currentHandValue + 2) % 3]++;
    }

    /**
     * @param int $hv
     * @return int
     */
    private function getSum($hv)
    {
        $sum = 0;
        for ($i = 0; $i < 3; $i++) {
            $sum += $this->history[$hv][$i];
        }

        return $sum;
    }
}
