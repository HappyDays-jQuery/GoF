<?php

namespace GoF\FactoryMethod;

class IdCard extends Product
{
    /**
     * @var string
     */
    private $owner;
    /**
     * @var int
     */
    private $serial;

    /**
     * IdCard constructor.
     * @param string $owner
     * @param int    $serial
     */
    public function __construct($owner, $serial)
    {
        echo "create: {$owner}({$serial})\n";
        $this->owner = $owner;
        $this->serial = $serial;
    }

    /**
     * @return void
     */
    public function useProduct()
    {
        echo "use: {$this->owner}({$this->serial})\n";
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return int
     */
    public function getSerial()
    {
        return $this->serial;
    }
}
