<?php

namespace GoF\Composite;

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
     * @return void
     */
    public function printList()
    {
        $this->printListWithPrefix("");
    }

    /**
     * @param string $prefix
     */
    abstract protected function printListWithPrefix($prefix);

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->getName()} ({$this->getSize()})";
    }
}
