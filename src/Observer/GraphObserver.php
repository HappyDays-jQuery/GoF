<?php

namespace GoF\Observer;

class GraphObserver implements Observer
{
    /**
     * @param NumberGenerator $generator
     * @return void
     */
    public function update(NumberGenerator $generator)
    {
        echo "GraphObserver:";
        $count = $generator->getNumber();
        for ($i = 0; $i < $count; $i++) {
            echo "*";
        }
        echo "\n";
    }
}
