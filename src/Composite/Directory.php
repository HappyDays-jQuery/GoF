<?php

namespace GoF\Composite;

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
     * @param string $prefix
     */
    protected function printListWithPrefix($prefix)
    {
        echo "{$prefix}/{$this}\n";
        $it = $this->directory->iterator();
        while ($it->valid()) {
            /**
             * @var Entry $entry
             */
            $entry = $it->current();
            $entry->printListWithPrefix("{$prefix}/{$this->name}");
            $it->next();
        }
    }
}
