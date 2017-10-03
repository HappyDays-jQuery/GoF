<?php

namespace GoF\Builder;

interface Builder
{
    /**
     * @param string $title
     * @return void
     */
    public function makeTitle($title);

    /**
     * @param string $str
     * @return void
     */
    public function makeString($str);

    /**
     * @param array $items
     * @return void
     */
    public function makeItems($items);

    /**
     * @return void
     */
    public function close();
}
