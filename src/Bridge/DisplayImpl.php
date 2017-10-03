<?php

namespace GoF\Bridge;

abstract class DisplayImpl
{
    /**
     * @return void
     */
    abstract public function rawOpen();

    /**
     * @return void
     */
    abstract public function rawPrint();

    /**
     * @return void
     */
    abstract public function rawClose();
}
