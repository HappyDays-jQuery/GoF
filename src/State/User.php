<?php

namespace GoF\State;

class User
{

    private $name;
    private $state;
    private $count = 0;

    /**
     * User constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->state = UnauthorizedState::getInstance();
        $this->resetCount();
    }

    /**
     * @return void
     */
    public function switchState()
    {
        echo "状態遷移:" . get_class($this->state) . "→";
        $this->state = $this->state->nextState();
        echo get_class($this->state) . "<br>";
        $this->resetCount();
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        return $this->state->isAuthenticated();
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
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return void
     */
    public function incrementCount()
    {
        $this->count++;
    }

    /**
     * @return void
     */
    public function resetCount()
    {
        $this->count = 0;
    }
}
