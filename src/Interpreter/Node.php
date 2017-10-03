<?php

namespace GoF\Interpreter;

abstract class Node
{
    /**
     * @param Context $context
     * @return void
     */
    abstract public function parse(Context $context);
}
