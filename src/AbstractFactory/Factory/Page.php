<?php

namespace GoF\AbstractFactory\Factory;

use GoF\Collection\ArrayList;

abstract class Page
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $author;
    /**
     * @var ArrayList
     */
    protected $contents;

    /**
     * Page constructor.
     * @param string $title
     * @param string $author
     */
    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->contents = new ArrayList();
    }

    /**
     * @param Item $item
     */
    public function add(Item $item)
    {
        $this->contents->add($item);
    }

    /**
     * @return string
     */
    abstract public function makeHTML();
}
