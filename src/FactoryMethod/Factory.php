<?php

namespace GoF\FactoryMethod;

abstract class Factory
{
    /**
     * @param string $owner
     * @return Product
     */
    final public function create($owner)
    {
        $product = $this->createProduct($owner);
        $this->registerProduct($product);

        return $product;
    }

    /**
     * @param string $owner
     * @return Product
     */
    abstract protected function createProduct($owner);

    /**
     * @param Product $product
     * @return void
     */
    abstract protected function registerProduct($product);
}
