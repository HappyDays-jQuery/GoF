<?php

namespace GoF\Visitor;

use GoF\Collection\ArrayList;

class Directory extends Entry
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var ArrayList
     */
    private $directory;

    /**
     * Directory constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->directory = new ArrayList();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        $size = 0;
        $it = $this->directory->iterator();
        while ($it->valid()) {
            /**
             * @var Entry $entry
             */
            $entry = $it->current();
            $size += $entry->getSize();
            $it->next();
        }

        return $size;
    }

    /**
     * @param Entry $entry
     * @return $this
     */
    public function add(Entry $entry)
    {
        $this->directory->add($entry);

        return $this;
    }

    /**
     * @param Visitor $v
     */
    public function accept(Visitor $v)
    {
        $v->visit($this);
    }

    /**
     * @return bool
     */
    public function isFile()
    {
        return false;
    }

    /**
     * @return ArrayList
     */
    public function getDirectory()
    {
        return $this->directory;
    }
}
