<?php

namespace GoF\Iterator;

interface Iterator
{
    /**
     * @return bool
     */
    public function hasNext();

    /**
     * @return Object
     */
    public function next();
}
