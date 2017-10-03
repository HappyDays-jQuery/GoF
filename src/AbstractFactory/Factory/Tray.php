<?php

namespace GoF\AbstractFactory\Factory;

use GoF\Collection\ArrayList;

abstract class Tray extends Item
{
    /**
     * @var Item[]
     */
    protected $tray;

    /**
     * Tray constructor.
     * @param string $caption
     */
    public function __construct($caption)
    {
        parent::__construct($caption);
        $this->tray = new ArrayList();
    }

    /**
     * @param Item $item
     */
    public function add(Item $item)
    {
        $this->tray->add($item);
    }
}
