<?php

namespace GoF\State;

class UnauthorizedState implements State
{
    /**
     * @var State|null
     */
    private static $singleton = null;

    /**
     * UnauthorizedState constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return State|UnauthorizedState|null
     */
    public static function getInstance()
    {
        if (self::$singleton === null) {
            self::$singleton = new UnauthorizedState();
        }
        return self::$singleton;
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        return false;
    }

    /**
     * @return State
     */
    public function nextState()
    {
        return AuthorizedState::getInstance();
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws \RuntimeException
     */
    final public function __clone()
    {
        throw new \RuntimeException ('Clone is not allowed against ' . get_class($this));
    }
}
