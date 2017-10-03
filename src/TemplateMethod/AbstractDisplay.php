<?php

namespace GoF\TemplateMethod;

abstract class AbstractDisplay
{
    /**
     * @return void
     */
    abstract public function open();

    /**
     * @return void
     */
    abstract public function printer();

    /**
     * @return void
     */
    abstract public function close();

    /**
     * @return void
     */
    final public function display()
    {
        $this->open();
        for ($i = 0; $i < 5; $i++) {
            $this->printer();
        }
        $this->close();
    }
}
