<?php

namespace GoF\State;

interface State
{
    /**
     * @return bool
     */
    public function isAuthenticated();

    /**
     * @return State
     */
    public function nextState();
}
