<?php

namespace GoF\Visitor;

abstract class Visitor
{
    /**
     * @param Entry $entry
     * @return void
     */
    abstract public function visit(Entry $entry);
}
