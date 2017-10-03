<?php

namespace GoF\Composite;

class File extends Entry
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $size;

    /**
     * File constructor.
     * @param string $name
     * @param int    $size
     */
    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
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
        return $this->size;
    }

    /**
     * @param string $prefix
     */
    protected function printListWithPrefix($prefix)
    {
        echo "{$prefix}/{$this}\n";
    }
}
