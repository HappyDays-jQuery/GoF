<?php

namespace GoF\Singleton;

class Tripleton
{
    /**
     * @var Tripleton[]
     */
    private static $triple;

    /**
     * Tripleton constructor.
     * @param int $id
     */
    private function __construct($id)
    {
        echo "create instance #{$id}.";
    }

    /**
     * @param int $id
     * @return Tripleton
     * @throws \Exception
     */
    public static function getInstance($id)
    {
        if ($id > 3 || $id < 0) {
            throw new \Exception("Invalid ID Exception.");
        }

        if (!isset(self::$triple[$id])) {
            self::$triple[$id] = new Tripleton($id);
        }

        return self::$triple[$id];
    }
}
