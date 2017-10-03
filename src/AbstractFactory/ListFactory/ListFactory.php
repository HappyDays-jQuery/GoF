<?php

namespace GoF\AbstractFactory\ListFactory;

use GoF\AbstractFactory\Factory\Factory;
use GoF\AbstractFactory\Factory\Link;
use GoF\AbstractFactory\Factory\Page;
use GoF\AbstractFactory\Factory\Tray;

class ListFactory extends Factory
{

    /**
     * @param string $caption
     * @param string $url
     * @return Link
     */
    public function createLink($caption, $url)
    {
        return new ListLink($caption, $url);
    }

    /**
     * @param string $caption
     * @return Tray
     */
    public function createTray($caption)
    {
        return new ListTray($caption);
    }

    /**
     * @param string $title
     * @param string $author
     * @return Page
     */
    public function createPage($title, $author)
    {
        return new ListPage($title, $author);
    }
}
