<?php

namespace GoF\Iterator;

interface Aggregate
{
    /**
     * @return Iterator
     */
    public function getIterator();
}
