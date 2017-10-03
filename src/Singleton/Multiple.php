<?php

namespace GoF\Singleton;

class Multiple
{
    /**
     * @var Multiple[]
     */
    private static $instances;

    /**
     * Multiple constructor.
     * @param string $name
     */
    private function __construct($name)
    {
        echo "create instance #{$name}.";
    }

    /**
     * @param string $name
     * @return Multiple
     */
    public static function getInstance($name)
    {
        if (!isset(self::$instances[$name])) {
            self::$instances[$name] = new Multiple($name);
        }
        return self::$instances[$name];
    }
}
