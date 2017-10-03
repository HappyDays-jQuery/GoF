<?php

namespace GoF\Collection;

class StringTokenizer
{
    /**
     * @var ArrayList
     */
    private $tokens;
    /**
     * @var \Iterator
     */
    private $it;
    /**
     * @var int
     */
    private $pos;

    /**
     * StringTokenizer constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        $this->tokens = new ArrayList($this->explodeText($text));
        $this->it = $this->tokens->iterator();
        $this->pos = 0;
    }

    /**
     * @return int
     */
    public function countTokens()
    {
        return $this->tokens->size();
    }

    /**
     * @return bool
     */
    public function hasMoreTokens()
    {
        return $this->pos < $this->countTokens();
    }

    /**
     * @return string
     */
    public function nextToken()
    {
        $current = $this->it->current();
        $this->pos++;
        $this->it->next();

        return $current;
    }

    /**
     * @param string $text
     * @return array
     */
    private function explodeText($text)
    {
        return explode(" ", $text);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $ret = "";
        while ($this->hasMoreTokens()) {
            $ret .= "[{$this->nextToken()}]";
        }
        return $ret;
    }
}
