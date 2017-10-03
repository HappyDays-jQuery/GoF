<?php

namespace GoF\AbstractFactory\ListFactory;

use GoF\AbstractFactory\Factory\Link;

class ListLink extends Link
{
    /**
     * ListLink constructor.
     * @param string $caption
     * @param string $url
     */
    public function __construct($caption, $url)
    {
        parent::__construct($caption, $url);
    }

    /**
     * @return string
     */
    public function makeHtml()
    {
        return "  <li><a href=\"{$this->url}\">{$this->caption}</a></li>\n";
    }
}
