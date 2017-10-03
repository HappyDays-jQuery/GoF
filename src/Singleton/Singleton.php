<?php

namespace GoF\Singleton;

class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    private function __construct()
    {
        echo "create instance.";
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
