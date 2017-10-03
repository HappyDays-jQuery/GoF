<?php

namespace GoF\AbstractFactory\Factory;

abstract class Link extends Item
{
    /**
     * @var string
     */
    protected $url;

    /**
     * Link constructor.
     * @param string $caption
     * @param string $url
     */
    public function __construct($caption, $url)
    {
        parent::__construct($caption);
        $this->url = $url;
    }
}
