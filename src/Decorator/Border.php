<?php

namespace GoF\Decorator;

abstract class Border extends Display
{
    /**
     * @var Display $display
     */
    protected $display;

    /**
     * Border constructor.
     * @param Display $display
     */
    public function __construct(Display $display)
    {
        $this->display = $display;
    }
}
