<?php

namespace GoF\Bridge;

class Display
{
    /**
     * @var DisplayImpl
     */
    private $impl;

    /**
     * Display constructor.
     * @param DisplayImpl $impl
     */
    public function __construct(DisplayImpl $impl)
    {
        $this->impl = $impl;
    }

    /**
     * @return void
     */
    public function open()
    {
        $this->impl->rawOpen();
    }

    /**
     * @return void
     */
    public function printer()
    {
        $this->impl->rawPrint();
    }


    /**
     * @return void
     */
    public function close()
    {
        $this->impl->rawClose();
    }

    /**
     * @return void
     */
    final public function display()
    {
        $this->open();
        $this->printer();
        $this->close();
    }
}
