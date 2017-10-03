<?php

namespace GoF\Visitor;

use GoF\Exception\FileTreatmentException;

abstract class Entry
{
    /**
     * @return string
     */
    abstract public function getName();

    /**
     * @return int
     */
    abstract public function getSize();

    /**
     * @param Entry $entry
     * @throws FileTreatmentException
     */
    public function add(Entry $entry)
    {
        throw new FileTreatmentException("Not valid. :{$entry->getName()}");
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->getName()} ({$this->getSize()})";
    }

    /**
     * @return bool
     */
    abstract public function isFile();
}
