<?php

namespace GoF\Visitor;

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
        return true;
    }
}
