<?php

namespace GoF\Observer;

interface Observer
{
    /**
     * @param NumberGenerator $generator
     * @return void
     */
    public function update(NumberGenerator $generator);
}
