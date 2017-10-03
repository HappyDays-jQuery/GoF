<?php

namespace GoF\Observer;

class DigitObserver implements Observer
{
    public function update(NumberGenerator $generator)
    {
        echo "DigitObserver:" . $generator->getNumber() . "\n";
    }
}
