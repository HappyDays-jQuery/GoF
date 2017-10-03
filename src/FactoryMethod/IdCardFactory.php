<?php

namespace GoF\FactoryMethod;

use GoF\Collection\ArrayList;

class IdCardFactory extends Factory
{
    /**
     * @var ArrayList
     */
    private $database;
    /**
     * @var int
     */
    private $serial = 300;

    public function __construct()
    {
        $this->database = new ArrayList();
    }

    /**
     * @param string $owner
     * @return Product
     */
    protected function createProduct($owner)
    {
        return new IdCard($owner, $this->serial++);
    }

    /**
     * @param Product $product
     * @return void
     */
    protected function registerProduct($product)
    {
        /**
         * @var IdCard $card
         */
        $card = $product;
        $this->database->add([$card->getSerial() => $card->getOwner()]);
    }

    /**
     * @return ArrayList
     */
    public function getDatabase()
    {
        return $this->database;
    }
}
