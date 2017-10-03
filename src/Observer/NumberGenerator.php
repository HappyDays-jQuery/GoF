<?php

namespace GoF\Observer;

use GoF\Collection\ArrayList;

abstract class NumberGenerator
{
    /**
     * @var ArrayList
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new ArrayList();
    }

    /**
     * @param Observer $observer
     */
    public function addObserver(Observer $observer)
    {
        $this->observers->add($observer);
    }

    /**
     * @param Observer $observer
     */
    public function deleteObserver(Observer $observer)
    {
        $this->observers->remove($observer);
    }

    /**
     * @return void
     */
    public function notify()
    {
        $it = $this->observers->iterator();
        while ($it->valid()) {
            $observer = $it->current();
            $observer->update($this);
            $it->next();
        }
    }

    /**
     * @return int
     */
    abstract public function getNumber();

    /**
     * @return void
     */
    abstract public function execute();
}
