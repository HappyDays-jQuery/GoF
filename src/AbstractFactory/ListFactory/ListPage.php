<?php

namespace GoF\AbstractFactory\ListFactory;

use GoF\AbstractFactory\Factory\Page;

class ListPage extends Page
{
    /**
     * ListPage constructor.
     * @param string $title
     * @param string $author
     */
    public function __construct($title, $author)
    {
        parent::__construct($title, $author);
    }

    /**
     * @return string
     */
    public function makeHTML()
    {
        $contents = "";
        $it = $this->contents->iterator();
        while ($it->valid()) {
            $item = $it->current();
            $contents .= $item->makeHtml();
            $it->next();
        }

        return <<< __EOL__
<html>
  <head>
    <title>{$this->title}</title>
  </head>
  <body>
    <h1>{$this->title}</h1>
    <ul>
      {$contents}
    </ul>
    <hr>
    <address>{$this->author}</address>
  </body>
</html>
__EOL__;
    }
}
