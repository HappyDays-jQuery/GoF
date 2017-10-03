<?php

namespace GoF\Prototype;

interface Product
{
    /**
     * @param string $str
     * @return void
     */
    public function useProduct($str);

    /**
     * @return Product
     */
    public function createClone();
}
