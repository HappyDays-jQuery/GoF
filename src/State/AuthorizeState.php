<?php

namespace GoF\State;

class AuthorizedState implements State
{
    /**
     * @var State|null
     */
    private static $singleton = null;

    private function __construct()
    {
    }

    /**
     * @return State
     */
    public static function getInstance()
    {
        if (self::$singleton == null) {
            self::$singleton = new AuthorizedState();
        }
        return self::$singleton;
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        return true;
    }

    /**
     * @return State
     */
    public function nextState()
    {
        return UnauthorizedState::getInstance();
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
