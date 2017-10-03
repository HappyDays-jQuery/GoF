<?php

namespace GoF\AbstractFactory\Factory;

abstract class Item
{
    /**
     * @var string
     */
    protected $caption;

    /**
     * Item constructor.
     * @param string $caption
     */
    public function __construct($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    abstract public function makeHtml();
}
