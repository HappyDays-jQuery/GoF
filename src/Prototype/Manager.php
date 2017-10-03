<?php

namespace GoF\Prototype;

class Manager
{
    /**
     * @var array
     */
    private $showcase = [];

    /**
     * @param string  $name
     * @param Product $proto
     */
    public function register($name, $proto)
    {
        $this->showcase[$name] = $proto;
    }

    /**
     * @param string $protoName
     * @return Product
     */
    public function createInstance($protoName)
    {
        $proto = $this->showcase[$protoName];

        return $proto->createClone();
    }
}
