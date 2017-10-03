<?php

namespace GoF\Visitor;

interface Element
{
    /**
     * @param Visitor $v
     * @return void
     */
    public function accept(Visitor $v);
}
